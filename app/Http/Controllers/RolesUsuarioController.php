<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grids\UsersGrid;
use App\Grids\RolUsuarioGrid;
use App\RolesUsuario;
use App\User;
use App\Helper;
use Validator;
use App\Http\Requests\RolesUsuarioRequest;
use App\Http\Requests\RolesUsuarioUpdateRequest;

class RolesUsuarioController extends Controller
{
    /**
     * listado de RolesUsuario
     * @param string
     * @return html
     */
    public function index(Request $request) {
        $array = Helper::getQuery($request->all(), [
            'nombre_usuario' => 'users.name',
            'fecha_alta' => 'rol_usuario.fecha_alta',
            'fecha_actualizacion' => 'rol_usuario.fecha_actualizacion',
            'id' => 'rol_usuario.id',
            'rol' => 'rol.rol',
        ]);
        $model = RolesUsuario::select([
                'id_user',
                'rol_id',
                'users.name as nombre_usuario',
                'rol_usuario.fecha_alta as fecha_alta',
                'rol_usuario.fecha_actualizacion as fecha_actualizacion',
                'rol_usuario.id as id',
                'rol.rol as rol'
            ])
            ->join('users', 'users.id', '=', 'rol_usuario.id_user')
            ->join('rol', 'rol.id', '=', 'rol_usuario.rol_id')
            ->where($array)
            ->getQuery();
        $grid = (new RolUsuarioGrid())
            ->create([
                'query' => $model,
                'request' => $request
            ])
            ->renderOn('rolesusuario.index');
        return $grid;
    }

    /**
     * Guarda el Rol
     */
    public function create(){
        return view('permisos.create');

    }

    public function show($id){
        $model = $this->findModel($id);
        return view('permisos.show',[
            'model' => $model
        ]);
    }

    public function destroy($id){
        $model = $this->findModel($id);
        if ($model->delete()) {
            flash('Eliminado con éxito!')->success();
            return redirect('permisos/index');
        }
        flash('¡Ocurrió un error!')->error();
        return redirect('permisos/index');
    }

    public function update($id){
        $model = $this->findModel($id);
        return view('permisos.update',[
            'model' => $model
        ]);
    }

    public function store(PermisosRequest $request){
        $model = permisos::create($request->all());
        flash('Creado con éxito!')->success();
        return redirect('permisos/show/' .   $model->id);
    }

    public function edit($id, PermisosUpdateRequest $request){
        $model = $this->findModel($id);
        $model->permiso = $request->get('permiso');
        $model->descripcion = $request->get('descripcion');
        if ($model->save()) {
            flash('¡Actualizado con éxito!')->success();
            return redirect('permisos/show/' .   $model->id);
        }
        flash('¡Ocurrió un error!')->error();
        return redirect('permisos/show/' .   $model->id);
    }

    /**
     * Finds the Empresas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Empresas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Permisos::find($id)) !== null) {
            return $model;
        } else {
            abort(404);
        }
    }

}

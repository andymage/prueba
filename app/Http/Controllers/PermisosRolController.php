<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grids\UsersGrid;
use App\Grids\PermisosRolGrid;
use App\PermisosRol;
use App\User;
use App\Helper;
use Validator;
use App\Http\Requests\PermisosRolRequest;
use App\Http\Requests\RolesUsuarioUpdateRequest;
use App\Permisos;
use App\Roles;

class PermisosRolController extends Controller
{
    /**
     * listado de RolesUsuario
     * @param string
     * @return html
     */
    public function index(Request $request) {
        $array = Helper::getQuery($request->all(), [
            'fecha_alta' => 'permisos_rol.fecha_alta',
            'fecha_actualizacion' => 'permisos_rol.fecha_actualizacion',
            'id' => 'permisos_rol.id',
            'rol' => 'roles.rol',
            'permiso' => 'permisos.permiso'
        ]);
        $model = PermisosRol::select([
                'permiso_id',
                'rol_id',
                'permisos_rol.fecha_alta as fecha_alta',
                'permisos_rol.fecha_actualizacion as fecha_actualizacion',
                'permisos_rol.id as id',
                'roles.rol as rol',
                'permisos.permiso as permiso'
            ])
            ->join('permisos', 'permisos.id', '=', 'permisos_rol.permiso_id')
            ->join('roles', 'roles.id', '=', 'permisos_rol.rol_id')
            ->where($array)
            ->getQuery();
        $grid = (new PermisosRolGrid())
            ->create([
                'query' => $model,
                'request' => $request
            ])
            ->renderOn('permisosrol.index');
        return $grid;
    }

    /**
     * Guarda el Rol
     */
    public function create(){
        $seleccione = [NULL => 'Seleccione'];
        $permisos = $seleccione + Permisos::pluck('permiso', 'id')->toArray();
        $roles = $seleccione + Roles::pluck('rol', 'id')->toArray();
        return view('permisosrol.create', [
            'permisos' => $permisos,
            'roles' => $roles
        ]);

    }

    public function show($id){
        $model = $this->findModel($id);
        return view('permisosrol.show',[
            'model' => $model
        ]);
    }

    public function destroy($id){
        $model = $this->findModel($id);
        if ($model->delete()) {
            flash('Eliminado con éxito!')->success();
            return redirect('permisosrol/index');
        }
        flash('¡Ocurrió un error!')->error();
        return redirect('permisosrol/index');
    }

    public function store(PermisosRolRequest $request){
        $model = PermisosRol::create($request->all());
        flash('Creado con éxito!')->success();
        return redirect('permisosrol/show/' .   $model->id);
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
        if (($model = PermisosRol::find($id)) !== null) {
            return $model;
        } else {
            abort(404);
        }
    }

}

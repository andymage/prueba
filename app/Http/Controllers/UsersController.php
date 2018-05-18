<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grids\UsersGrid;
use App\Roles;
use App\User;
use App\RolesUsuario;
use App\Http\Requests\UsuarioRequest;
use App\Http\Requests\UsuarioUpdateRequest;


class UsersController extends Controller
{
    /**
     * listado de roles
     * @param string
     * @return html
     */
    public function index(Request $request) {
        return (new UsersGrid())
            ->create([
                'query' => User::query(),
                'request' => $request
            ])
            ->renderOn('users.index');
    }

    /**
     * 
     */
    public function create(){
        $select = [NULL => 'Seleccione'];
        $roles = Roles::pluck('rol', 'id')->toArray();
        $roles = $select + $roles;
        return view('users.create',[
            'roles' => $roles
        ]);
    }

    public function store(UsuarioRequest $request){
        $username = str_replace(' ', '', $request->get('username'));
        $model = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'username' => $username
        ]);
        $roles = RolesUsuario::create([
            'usuario_id' => $model->id,
            'rol_id' => $request->get('rol_id')
        ]);
        flash('¡Creado con éxito!')->success();
        return redirect('users/show/' . $model->id);
    }

    public function show($id){
        $model = $this->findModel($id);
        return view('users.show',[
            'model' => $model
        ]);
    }

    public function update($id){
        if (\Auth::user()->hasRol('admin')) {
            $model = $this->findModel($id);
        }
        else{
            $model = \Auth::user();
        }
        $select = [NULL => 'Seleccione'];
        $roles = Roles::pluck('rol', 'id')->toArray();
        $roles = $select + $roles;
        return view('users.update',[
            'model' => $model,
            'roles' => $roles
        ]);
    }

    public function edit($id, UsuarioUpdateRequest $request){
        $model = $this->findModel($id);
        $model->name = $request->get('name');
        $model->email = $request->get('email');
        if (!empty($request->get('password'))) {
            $model->password = bcrypt($request->get('password'));
        }
        if ($model->save()) {
            $permisos = RolesUsuario::where([
                ['usuario_id', '=', $model->id],
                ['rol_id', '=', $request->get('rol_id')]
            ])
            ->first();
            if (empty($permisos)) {
                $model->roles()->delete();
                $permisos = RolesUsuario::create([
                    'rol_id' => $request->get('rol_id'),
                    'usuario_id' => $model->id,
                ]);
            }
            flash('¡Actualizado con éxito!')->success();
            return redirect('users/show/' . $model->id);
        }
        flash('¡Ocurrió un error!')->error();
        return redirect('users/show/' . $model->id);
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
        if (($model = User::find($id)) !== null) {
            return $model;
        } else {
            abort(404);
        }
    }
}

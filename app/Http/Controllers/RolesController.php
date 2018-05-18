<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grids\UsersGrid;
use App\Grids\RolGrid;
use App\Roles;
use App\User;
use App\Helper;
use Validator;
use App\Http\Requests\RolesRequest;
use App\Http\Requests\RolesUpdateRequest;

class RolesController extends Controller
{
    /**
     * listado de roles
     * @param string
     * @return html
     */
    public function index(Request $request) {
        $array = Helper::getQuery($request->all());
        $model = Roles::where($array)->getQuery();

        $grid = (new RolGrid())
            ->create([
                'query' => $model,
                'request' => $request
            ])
            ->renderOn('roles.index');
        return $grid;
    }

    /**
     * Guarda el Rol
     */
    public function create(){
        return view('roles.create');

    }

    public function show($id){
        $model = $this->findModel($id);
        return view('roles.show',[
            'model' => $model
        ]);
    }

    public function destroy($id){
        $model = $this->findModel($id);
        if ($model->delete()) {
            flash('Eliminado con éxito!')->success();
            return redirect('roles/index');
        }
        flash('¡Ocurrió un error!')->error();
        return redirect('roles/index');
    }

    public function update($id){
        $model = $this->findModel($id);
        return view('roles.update',[
            'model' => $model
        ]);
    }

    public function store(RolesRequest $request){
        $model = Roles::create($request->all());
        flash('Creado con éxito!')->success();
        return redirect('roles/show/' .   $model->id);
    }

    public function edit($id, RolesUpdateRequest $request){
        $model = $this->findModel($id);
        $model->rol = $request->get('rol');
        $model->descripcion = $request->get('descripcion');
        if ($model->save()) {
            flash('¡Actualizado con éxito!')->success();
            return redirect('roles/show/' .   $model->id);
        }
        flash('¡Ocurrió un error!')->error();
        return redirect('roles/show/' .   $model->id);
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
        if (($model = Roles::find($id)) !== null) {
            return $model;
        } else {
            abort(404);
        }
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Oportunidades;
use App\User;
use App\Etapas;
use App\Creditos;
use App\Helper;
use Validator;
use App\Grids\OportunidadesGrid;
use App\Prospectos;
use App\Descripciones;
Use App\Http\Requests\OportunidadesinicialRequest;
Use App\Http\Requests\OportunidadRequest;
use Illuminate\Support\Facades\DB;

class OportunidadesController extends Controller
{
    /**
     * listado de permisos
     * @param string
     * @return html
     */
    public function index(Request $request) {
        $array = Helper::getQuery($request->all());
        $model = Oportunidades::where($array)->getQuery();

        $grid = (new OportunidadesGrid())
            ->create([
                'query' => $model,
                'request' => $request
            ])
            ->renderOn('oportunidades.index');
        return $grid;
    }

    public function create(){
        $tipo_registro = [NULL => 'Seleccione'] + Oportunidades::$tipo_registros;
        $clientes = Prospectos::select(
                DB::raw("CONCAT(apellido_paterno, ' ', apellido_materno, ' ', nombre) AS name"),'id'
            )
            ->pluck('name', 'id')
            ->toArray();
        $clientes = Helper::ArrayHelperSelect($clientes);
        return view('oportunidades.create',[
            'tipo_registro' => $tipo_registro,
            'clientes' => $clientes
        ]);
    }

    public function avanza(OportunidadesinicialRequest $request){
        return redirect('oportunidades/avanzados/' . $request->get('id_prospecto') . '/' . $request->get('tipo_registro'));
    }

    public function avanzaRedirect($id_prospecto, $tipo_registros){
        $tipo_registro = Helper::ArrayHelperSelect(Oportunidades::$tipo_registros);
        $etapas = Helper::ArrayHelperSelect(Etapas::pluck('nombre', 'id')->toArray());
        $tipo_creditos = Helper::ArrayHelperSelect(Creditos::$tipo_creditos);
        $clientes = Prospectos::select(
                DB::raw("CONCAT(apellido_paterno, ' ', apellido_materno, ' ', nombre) AS name"),'id'
            )
            ->pluck('name', 'id')
            ->toArray();
        $clientes = Helper::ArrayHelperSelect($clientes);
        if (Oportunidades::OPORTUNIDAD == $tipo_registros) {
            return view('oportunidades.oportunidad',[
                'tipos_registro' => $tipo_registro,
                'etapas' => $etapas,
                'tipo_creditos' => $tipo_creditos,
                'clientes' => $clientes,
                'id_tipo_registro' => $tipo_registros,
                'id_prospecto' => $id_prospecto
            ]);
        }
        else if (Oportunidades::PERSONA_FÍSICA_APROBADA == $tipo_registros) {
            return view('oportunidades.fisicaaprobada',[
                'tipos_registro' => $tipo_registro,
                'etapas' => $etapas,
                'tipo_creditos' => $tipo_creditos,
                'clientes' => $clientes,
                'id_tipo_registro' => $tipo_registros,
                'id_prospecto' => $id_prospecto
            ]);
        }
    }

    public function saveOportunidades(OportunidadRequest $request){
        $data = $request->all();
        DB::beginTransaction();
        try {
            if ($request->get('Oportunidad')) {
                $data['Oportunidad']['id_user'] = \Auth::user()->id;
                $model = Oportunidades::create($data['Oportunidad']);
                if ($request->get('Credito')) {
                    $data['Credito']['id_user'] = \Auth::user()->id;
                    $data['Credito']['id_oportunidad'] = $model->id;
                    $credito = Creditos::create($data['Credito']);
                }
                if ($request->get('Descripcion')) {
                    $data['Descripcion']['id_oportunidad'] = $model->id;
                    $data['Descripcion']['id_user'] = $model->id;
                    $descripcion = Descripciones::create($data['Descripcion']);
                }
                DB::commit();
                flash('¡Creado Correctamente!')->success();
                return redirect('oportunidades/index');
            }
            
        } catch (Exception $e) {
            DB::rollback();
            flash('¡Ocurrió un Error!')->error();
            return redirect('oportunidades/index');
            
        }
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
        if (($model = Oportunidades::find($id)) !== null) {
            return $model;
        } else {
            abort(404);
        }
    }

}

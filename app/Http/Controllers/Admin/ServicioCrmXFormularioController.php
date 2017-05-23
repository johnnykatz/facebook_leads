<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateServicioCrmXFormularioRequest;
use App\Http\Requests\Admin\UpdateServicioCrmXFormularioRequest;
use App\Models\Admin\AsociacionCamposServicios;
use App\Models\Admin\CampoServicioCrm;
use App\Models\Admin\Formulario;
use App\Models\Admin\ServicioCrm;
use App\Repositories\Admin\ServicioCrmXFormularioRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ServicioCrmXFormularioController extends InfyOmBaseController
{
    /** @var  ServicioCrmXFormularioRepository */
    private $servicioCrmXFormularioRepository;

    public function __construct(ServicioCrmXFormularioRepository $servicioCrmXFormularioRepo)
    {
        $this->servicioCrmXFormularioRepository = $servicioCrmXFormularioRepo;
    }

    /**
     * Display a listing of the ServicioCrmXFormulario.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->servicioCrmXFormularioRepository->pushCriteria(new RequestCriteria($request));
        $servicioCrmXFormularios = $this->servicioCrmXFormularioRepository->all();

        return view('admin.servicioCrmXFormularios.index')
            ->with('servicioCrmXFormularios', $servicioCrmXFormularios);
    }

    /**
     * Show the form for creating a new ServicioCrmXFormulario.
     *
     * @return Response
     */
    public function create($formulario_id)
    {
        $formulario = Formulario::find($formulario_id);
        $servicios = ServicioCrm::orderBy('nombre', 'ASC')->lists('nombre', 'id');
        $campos = DB::select('SELECT COLUMN_NAME
                          FROM INFORMATION_SCHEMA.COLUMNS
                          WHERE table_name ="' . $formulario->db_name . '"');
        $arrayCampos = array();
        foreach ($campos as $campo) {
            $arrayCampos[$campo->COLUMN_NAME] = $campo->COLUMN_NAME;
        }
        return view('admin.servicioCrmXFormularios.create')
            ->with('servicios', $servicios)
            ->with('formulario_id', $formulario_id)
            ->with('campos', $arrayCampos);
    }

    /**
     * Store a newly created ServicioCrmXFormulario in storage.
     *
     * @param CreateServicioCrmXFormularioRequest $request
     *
     * @return Response
     */
    public function store(CreateServicioCrmXFormularioRequest $request)
    {

        $request['estado'] = true;
        $input = $request->all();

        $servicioCrmXFormulario = $this->servicioCrmXFormularioRepository->create($input);

        $campos = CampoServicioCrm::where('servicio_crm_id', $request['servicio_crm_id'])->get();
        foreach ($campos as $campo) {
            $asociacion = new AsociacionCamposServicios();
            $asociacion->campo_servicio_crm_id = $campo->id;
            $asociacion->formulario_id = $request['formulario_id'];
            $asociacion->estado = true;
            if (isset($request[strtoupper($campo->nombre)])) {
                $asociacion->campo_formulario = $request[strtoupper($campo->nombre)];
            }
            $asociacion->save();
        }


        Flash::success('Configuracion guardada con exito');

        return redirect(route('admin.formularios.index'));
    }

    /**
     * Display the specified ServicioCrmXFormulario.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $servicioCrmXFormulario = $this->servicioCrmXFormularioRepository->findWithoutFail($id);

        if (empty($servicioCrmXFormulario)) {
            Flash::error('ServicioCrmXFormulario not found');

            return redirect(route('admin.servicioCrmXFormularios.index'));
        }

        return view('admin.servicioCrmXFormularios.show')->with('servicioCrmXFormulario', $servicioCrmXFormulario);
    }

    /**
     * Show the form for editing the specified ServicioCrmXFormulario.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $servicioCrmXFormulario = $this->servicioCrmXFormularioRepository->findWithoutFail($id);

        if (empty($servicioCrmXFormulario)) {
            Flash::error('ServicioCrmXFormulario not found');

            return redirect(route('admin.servicioCrmXFormularios.index'));
        }

        return view('admin.servicioCrmXFormularios.edit')->with('servicioCrmXFormulario', $servicioCrmXFormulario);
    }

    /**
     * Update the specified ServicioCrmXFormulario in storage.
     *
     * @param  int $id
     * @param UpdateServicioCrmXFormularioRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateServicioCrmXFormularioRequest $request)
    {
        $servicioCrmXFormulario = $this->servicioCrmXFormularioRepository->findWithoutFail($id);

        if (empty($servicioCrmXFormulario)) {
            Flash::error('ServicioCrmXFormulario not found');

            return redirect(route('admin.servicioCrmXFormularios.index'));
        }

        $servicioCrmXFormulario = $this->servicioCrmXFormularioRepository->update($request->all(), $id);

        Flash::success('ServicioCrmXFormulario updated successfully.');

        return redirect(route('admin.servicioCrmXFormularios.index'));
    }

    /**
     * Remove the specified ServicioCrmXFormulario from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $servicioCrmXFormulario = $this->servicioCrmXFormularioRepository->findWithoutFail($id);

        if (empty($servicioCrmXFormulario)) {
            Flash::error('ServicioCrmXFormulario not found');

            return redirect(route('admin.servicioCrmXFormularios.index'));
        }

        $this->servicioCrmXFormularioRepository->delete($id);

        Flash::success('ServicioCrmXFormulario deleted successfully.');

        return redirect(route('admin.servicioCrmXFormularios.index'));
    }
}

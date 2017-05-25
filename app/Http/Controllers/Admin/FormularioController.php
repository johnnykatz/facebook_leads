<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateFormularioRequest;
use App\Http\Requests\Admin\UpdateFormularioRequest;
use App\Models\Admin\Formulario;
use App\Providers\FacebookProvider;
use App\Providers\FuncionesProvider;
use App\Repositories\Admin\FormularioRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use FacebookAds\Object\LeadgenForm;
use Illuminate\Database\Schema\Blueprint;

class FormularioController extends InfyOmBaseController
{
    /** @var  FormularioRepository */
    private $formularioRepository;

    public function __construct(FormularioRepository $formularioRepo)
    {
        $this->formularioRepository = $formularioRepo;
    }

    /**
     * Display a listing of the Formulario.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->formularioRepository->pushCriteria(new RequestCriteria($request));
        $formularios = $this->formularioRepository->all();
        $url = FacebookProvider::fb_login();

        return view('admin.formularios.index')
            ->with('url', $url)
            ->with('formularios', $formularios);
    }

    /**
     * Show the form for creating a new Formulario.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.formularios.create');
    }

    /**
     * Store a newly created Formulario in storage.
     *
     * @param CreateFormularioRequest $request
     *
     * @return Response
     */
    public function store(CreateFormularioRequest $request)
    {
        $formulario = Formulario::where('form_id', trim($request['form_id']))->first();

        if ($formulario) {
            Flash::error('El Form_id ya esta creado.');

            return redirect(route('admin.formularios.index'));
        }
        $input = $request->all();

        $formulario = $this->formularioRepository->create($input);

        Flash::success('Formulario saved successfully.');

        return redirect(route('admin.formularios.index'));
    }

    /**
     * Display the specified Formulario.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $formulario = $this->formularioRepository->findWithoutFail($id);

        if (empty($formulario)) {
            Flash::error('Formulario not found');

            return redirect(route('admin.formularios.index'));
        }

        return view('admin.formularios.show')->with('formulario', $formulario);
    }

    /**
     * Show the form for editing the specified Formulario.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $formulario = $this->formularioRepository->findWithoutFail($id);

        if (empty($formulario)) {
            Flash::error('Formulario not found');

            return redirect(route('admin.formularios.index'));
        }

        return view('admin.formularios.edit')->with('formulario', $formulario);
    }

    /**
     * Update the specified Formulario in storage.
     *
     * @param  int $id
     * @param UpdateFormularioRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFormularioRequest $request)
    {
        $formulario = $this->formularioRepository->findWithoutFail($id);

        if (empty($formulario)) {
            Flash::error('Formulario not found');

            return redirect(route('admin.formularios.index'));
        }

        $formulario = $this->formularioRepository->update($request->all(), $id);

        Flash::success('Formulario updated successfully.');

        return redirect(route('admin.formularios.index'));
    }

    /**
     * Remove the specified Formulario from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $formulario = $this->formularioRepository->findWithoutFail($id);

        if (empty($formulario)) {
            Flash::error('Formulario not found');

            return redirect(route('admin.formularios.index'));
        }

        $this->formularioRepository->delete($id);

        Flash::success('Formulario deleted successfully.');

        return redirect(route('admin.formularios.index'));
    }

    public function crearEstructura($id, Request $request)
    {

        FacebookProvider::conexionFacebook();

        $formulario = Formulario::find($id);
        $form = new LeadgenForm($formulario->form_id);
        $fields = $form->getFields();
        $leads = $form->getLeads();

        foreach ($leads as $lead) {
            $data = $lead->getData();
            $fields = $data['field_data'];
            break;
        }

        try {
            \Illuminate\Support\Facades\Schema::create('form_' . $formulario->form_id, function (Blueprint $table) use ($fields) {
                $table->increments('id');
                $table->string('lead_id');
                $table->dateTime('created_time');
                $table->string('formulario_id');

                foreach ($fields as $field) {
                    $table->string(FuncionesProvider::limpiaCadena($field['name']));
                }
                $table->timestamps();
            });
        } catch (\Illuminate\Database\QueryException $e) {
            echo implode(',', $e->errorInfo);
        }
        $datosForm = $form->read();

        $formulario->db_name = 'form_' . $formulario->form_id;
        $formulario->con_estructura = true;
        $formulario->nombre = $datosForm->name;
        $formulario->save();

        Flash::success('Estructura creada con exito.');

        return redirect(route('admin.formularios.index'));

    }

    public function listarDatos($id, Request $request)
    {
        $formulario = Formulario::find($id);

        $estructura = DB::select('SELECT distinct(COLUMN_NAME)
                          FROM INFORMATION_SCHEMA.COLUMNS
                          WHERE table_name ="' . $formulario->db_name . '"');

        $datos = DB::select('SELECT *
                          FROM ' . $formulario->db_name . '
                          order by created_time desc');
        $result = null;
        foreach ($datos as $dato) {
            $result[] = (array)$dato;
        }
        return view('admin.formularios.index_datos')
            ->with('estructura', $estructura)
            ->with('formulario', $formulario)
            ->with('datos', $result);


    }


}

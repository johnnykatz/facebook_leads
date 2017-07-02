<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateServiciosCrmsXLandingRequest;
use App\Http\Requests\Admin\UpdateServiciosCrmsXLandingRequest;
use App\Models\Admin\CampoServicioCrm;
use App\Models\Admin\Landing;
use App\Models\Admin\LandingsCamposServicio;
use App\Repositories\Admin\ServiciosCrmsXLandingRepository;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ServiciosCrmsXLandingController extends InfyOmBaseController
{
    /** @var  ServiciosCrmsXLandingRepository */
    private $serviciosCrmsXLandingRepository;

    public function __construct(ServiciosCrmsXLandingRepository $serviciosCrmsXLandingRepo)
    {
        $this->serviciosCrmsXLandingRepository = $serviciosCrmsXLandingRepo;
    }

    /**
     * Display a listing of the ServiciosCrmsXLanding.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->serviciosCrmsXLandingRepository->pushCriteria(new RequestCriteria($request));
        $serviciosCrmsXLandings = $this->serviciosCrmsXLandingRepository->all();

        return view('admin.serviciosCrmsXLandings.index')
            ->with('serviciosCrmsXLandings', $serviciosCrmsXLandings);
    }

    /**
     * Show the form for creating a new ServiciosCrmsXLanding.
     *
     * @return Response
     */
    public function create($landing_id)
    {
	    $landing = Landing::find($landing_id);
	    $servicio = $landing->serviciosCrmsXLandings()->first()->servicioCrm;

	    $campos = DB::select('SELECT COLUMN_NAME
                          FROM INFORMATION_SCHEMA.COLUMNS
                          WHERE table_name ="' . $landing->db_name . '"');
	    $arrayCampos = array();

	    foreach ($campos as $campo) {
		    $arrayCampos[$campo->COLUMN_NAME] = $campo->COLUMN_NAME;
	    }

	    return view('admin.serviciosCrmsXLandings.create')
		    ->with('servicio', $servicio)
		    ->with('landing_id', $landing_id)
		    ->with('campos', $arrayCampos);

    }

    /**
     * Store a newly created ServiciosCrmsXLanding in storage.
     *
     * @param CreateServiciosCrmsXLandingRequest $request
     *
     * @return Response
     */
    public function store(CreateServiciosCrmsXLandingRequest $request)
    {
	    $camposDelete = DB::table('landings_campos_servicios as a')
	                      ->join('campos_servicios_crms as c', 'c.id', '=', 'a.campos_servicios_crm_id')
	                      ->where('landing_id', $request['landing_id'])
	                      ->where('c.servicio_crm_id', $request['servicios_crm_id'])
	                      ->select('a.id')
	                      ->get();

	    if (count($camposDelete) > 0) {
		    foreach ($camposDelete as $item) {
			    DB::table('landings_campos_servicios')
			      ->where('id', $item->id)
			      ->delete();
		    }
	    }

//	    $servicioCrmXLanding = DB::table('servicios_crms_x_landings')
//	                                ->where('landing_id', $request['landing_id'])
//	                                ->where('servicios_crm_id', $request['servicios_crm_id'])
//	                                ->delete();

	    if (!isset($request['eliminar'])) {

		    $request['estado'] = true;
		    $input = $request->all();
//		    $servicioCrmXLanding = $this->serviciosCrmsXLandingRepository->create($input);

		    $campos = CampoServicioCrm::where('servicio_crm_id', $request['servicios_crm_id'])->get();

		    foreach ($campos as $campo) {
			    $asociacion = new LandingsCamposServicio();
			    $asociacion->campos_servicios_crm_id = $campo->id;
			    $asociacion->landing_id = $request['landing_id'];
			    $asociacion->estado = true;
			    if (isset($request[$campo->nombre])) {
				    $asociacion->campo_formulario = $request[$campo->nombre];
			    }
			    $asociacion->save();
		    }

		    Flash::success('Configuracion guardada con exito');

		    return redirect(route('admin.landings.index'));
	    } else {
		    Flash::success('Configuracion eliminada con exito');

		    return redirect(route('admin.landings.index'));
	    }
    }

    /**
     * Display the specified ServiciosCrmsXLanding.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $serviciosCrmsXLanding = $this->serviciosCrmsXLandingRepository->findWithoutFail($id);

        if (empty($serviciosCrmsXLanding)) {
            Flash::error('ServiciosCrmsXLanding not found');

            return redirect(route('admin.serviciosCrmsXLandings.index'));
        }

        return view('admin.serviciosCrmsXLandings.show')->with('serviciosCrmsXLanding', $serviciosCrmsXLanding);
    }

    /**
     * Show the form for editing the specified ServiciosCrmsXLanding.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $serviciosCrmsXLanding = $this->serviciosCrmsXLandingRepository->findWithoutFail($id);

        if (empty($serviciosCrmsXLanding)) {
            Flash::error('ServiciosCrmsXLanding not found');

            return redirect(route('admin.serviciosCrmsXLandings.index'));
        }

        return view('admin.serviciosCrmsXLandings.edit')->with('serviciosCrmsXLanding', $serviciosCrmsXLanding);
    }

    /**
     * Update the specified ServiciosCrmsXLanding in storage.
     *
     * @param  int              $id
     * @param UpdateServiciosCrmsXLandingRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateServiciosCrmsXLandingRequest $request)
    {
        $serviciosCrmsXLanding = $this->serviciosCrmsXLandingRepository->findWithoutFail($id);

        if (empty($serviciosCrmsXLanding)) {
            Flash::error('ServiciosCrmsXLanding not found');

            return redirect(route('admin.serviciosCrmsXLandings.index'));
        }

        $serviciosCrmsXLanding = $this->serviciosCrmsXLandingRepository->update($request->all(), $id);

        Flash::success('ServiciosCrmsXLanding updated successfully.');

        return redirect(route('admin.serviciosCrmsXLandings.index'));
    }

    /**
     * Remove the specified ServiciosCrmsXLanding from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $serviciosCrmsXLanding = $this->serviciosCrmsXLandingRepository->findWithoutFail($id);

        if (empty($serviciosCrmsXLanding)) {
            Flash::error('ServiciosCrmsXLanding not found');

            return redirect(route('admin.serviciosCrmsXLandings.index'));
        }

        $this->serviciosCrmsXLandingRepository->delete($id);

        Flash::success('ServiciosCrmsXLanding deleted successfully.');

        return redirect(route('admin.serviciosCrmsXLandings.index'));
    }
}

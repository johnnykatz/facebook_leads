<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateLandingsEnviadosXServicioRequest;
use App\Http\Requests\Admin\UpdateLandingsEnviadosXServicioRequest;
use App\Repositories\Admin\LandingsEnviadosXServicioRepository;
use App\Http\Controllers\Admin\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class LandingsEnviadosXServicioController extends InfyOmBaseController
{
    /** @var  LandingsEnviadosXServicioRepository */
    private $landingsEnviadosXServicioRepository;

    public function __construct(LandingsEnviadosXServicioRepository $landingsEnviadosXServicioRepo)
    {
        $this->landingsEnviadosXServicioRepository = $landingsEnviadosXServicioRepo;
    }

    /**
     * Display a listing of the LandingsEnviadosXServicio.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->landingsEnviadosXServicioRepository->pushCriteria(new RequestCriteria($request));
        $landingsEnviadosXServicios = $this->landingsEnviadosXServicioRepository->all();

        return view('admin.landingsEnviadosXServicios.index')
            ->with('landingsEnviadosXServicios', $landingsEnviadosXServicios);
    }

    /**
     * Show the form for creating a new LandingsEnviadosXServicio.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.landingsEnviadosXServicios.create');
    }

    /**
     * Store a newly created LandingsEnviadosXServicio in storage.
     *
     * @param CreateLandingsEnviadosXServicioRequest $request
     *
     * @return Response
     */
    public function store(CreateLandingsEnviadosXServicioRequest $request)
    {
        $input = $request->all();

        $landingsEnviadosXServicio = $this->landingsEnviadosXServicioRepository->create($input);

        Flash::success('LandingsEnviadosXServicio saved successfully.');

        return redirect(route('admin.landingsEnviadosXServicios.index'));
    }

    /**
     * Display the specified LandingsEnviadosXServicio.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $landingsEnviadosXServicio = $this->landingsEnviadosXServicioRepository->findWithoutFail($id);

        if (empty($landingsEnviadosXServicio)) {
            Flash::error('LandingsEnviadosXServicio not found');

            return redirect(route('admin.landingsEnviadosXServicios.index'));
        }

        return view('admin.landingsEnviadosXServicios.show')->with('landingsEnviadosXServicio', $landingsEnviadosXServicio);
    }

    /**
     * Show the form for editing the specified LandingsEnviadosXServicio.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $landingsEnviadosXServicio = $this->landingsEnviadosXServicioRepository->findWithoutFail($id);

        if (empty($landingsEnviadosXServicio)) {
            Flash::error('LandingsEnviadosXServicio not found');

            return redirect(route('admin.landingsEnviadosXServicios.index'));
        }

        return view('admin.landingsEnviadosXServicios.edit')->with('landingsEnviadosXServicio', $landingsEnviadosXServicio);
    }

    /**
     * Update the specified LandingsEnviadosXServicio in storage.
     *
     * @param  int              $id
     * @param UpdateLandingsEnviadosXServicioRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLandingsEnviadosXServicioRequest $request)
    {
        $landingsEnviadosXServicio = $this->landingsEnviadosXServicioRepository->findWithoutFail($id);

        if (empty($landingsEnviadosXServicio)) {
            Flash::error('LandingsEnviadosXServicio not found');

            return redirect(route('admin.landingsEnviadosXServicios.index'));
        }

        $landingsEnviadosXServicio = $this->landingsEnviadosXServicioRepository->update($request->all(), $id);

        Flash::success('LandingsEnviadosXServicio updated successfully.');

        return redirect(route('admin.landingsEnviadosXServicios.index'));
    }

    /**
     * Remove the specified LandingsEnviadosXServicio from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $landingsEnviadosXServicio = $this->landingsEnviadosXServicioRepository->findWithoutFail($id);

        if (empty($landingsEnviadosXServicio)) {
            Flash::error('LandingsEnviadosXServicio not found');

            return redirect(route('admin.landingsEnviadosXServicios.index'));
        }

        $this->landingsEnviadosXServicioRepository->delete($id);

        Flash::success('LandingsEnviadosXServicio deleted successfully.');

        return redirect(route('admin.landingsEnviadosXServicios.index'));
    }
}

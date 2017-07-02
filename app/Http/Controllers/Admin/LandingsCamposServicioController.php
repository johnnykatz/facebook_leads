<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateLandingsCamposServicioRequest;
use App\Http\Requests\Admin\UpdateLandingsCamposServicioRequest;
use App\Repositories\Admin\LandingsCamposServicioRepository;
use App\Http\Controllers\Admin\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class LandingsCamposServicioController extends InfyOmBaseController
{
    /** @var  LandingsCamposServicioRepository */
    private $landingsCamposServicioRepository;

    public function __construct(LandingsCamposServicioRepository $landingsCamposServicioRepo)
    {
        $this->landingsCamposServicioRepository = $landingsCamposServicioRepo;
    }

    /**
     * Display a listing of the LandingsCamposServicio.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->landingsCamposServicioRepository->pushCriteria(new RequestCriteria($request));
        $landingsCamposServicios = $this->landingsCamposServicioRepository->all();

        return view('admin.landingsCamposServicios.index')
            ->with('landingsCamposServicios', $landingsCamposServicios);
    }

    /**
     * Show the form for creating a new LandingsCamposServicio.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.landingsCamposServicios.create');
    }

    /**
     * Store a newly created LandingsCamposServicio in storage.
     *
     * @param CreateLandingsCamposServicioRequest $request
     *
     * @return Response
     */
    public function store(CreateLandingsCamposServicioRequest $request)
    {
        $input = $request->all();

        $landingsCamposServicio = $this->landingsCamposServicioRepository->create($input);

        Flash::success('LandingsCamposServicio saved successfully.');

        return redirect(route('admin.landingsCamposServicios.index'));
    }

    /**
     * Display the specified LandingsCamposServicio.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $landingsCamposServicio = $this->landingsCamposServicioRepository->findWithoutFail($id);

        if (empty($landingsCamposServicio)) {
            Flash::error('LandingsCamposServicio not found');

            return redirect(route('admin.landingsCamposServicios.index'));
        }

        return view('admin.landingsCamposServicios.show')->with('landingsCamposServicio', $landingsCamposServicio);
    }

    /**
     * Show the form for editing the specified LandingsCamposServicio.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $landingsCamposServicio = $this->landingsCamposServicioRepository->findWithoutFail($id);

        if (empty($landingsCamposServicio)) {
            Flash::error('LandingsCamposServicio not found');

            return redirect(route('admin.landingsCamposServicios.index'));
        }

        return view('admin.landingsCamposServicios.edit')->with('landingsCamposServicio', $landingsCamposServicio);
    }

    /**
     * Update the specified LandingsCamposServicio in storage.
     *
     * @param  int              $id
     * @param UpdateLandingsCamposServicioRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLandingsCamposServicioRequest $request)
    {
        $landingsCamposServicio = $this->landingsCamposServicioRepository->findWithoutFail($id);

        if (empty($landingsCamposServicio)) {
            Flash::error('LandingsCamposServicio not found');

            return redirect(route('admin.landingsCamposServicios.index'));
        }

        $landingsCamposServicio = $this->landingsCamposServicioRepository->update($request->all(), $id);

        Flash::success('LandingsCamposServicio updated successfully.');

        return redirect(route('admin.landingsCamposServicios.index'));
    }

    /**
     * Remove the specified LandingsCamposServicio from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $landingsCamposServicio = $this->landingsCamposServicioRepository->findWithoutFail($id);

        if (empty($landingsCamposServicio)) {
            Flash::error('LandingsCamposServicio not found');

            return redirect(route('admin.landingsCamposServicios.index'));
        }

        $this->landingsCamposServicioRepository->delete($id);

        Flash::success('LandingsCamposServicio deleted successfully.');

        return redirect(route('admin.landingsCamposServicios.index'));
    }
}

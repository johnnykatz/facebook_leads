<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateAsociacionCamposServiciosRequest;
use App\Http\Requests\Admin\UpdateAsociacionCamposServiciosRequest;
use App\Repositories\Admin\AsociacionCamposServiciosRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AsociacionCamposServiciosController extends InfyOmBaseController
{
    /** @var  AsociacionCamposServiciosRepository */
    private $asociacionCamposServiciosRepository;

    public function __construct(AsociacionCamposServiciosRepository $asociacionCamposServiciosRepo)
    {
        $this->asociacionCamposServiciosRepository = $asociacionCamposServiciosRepo;
    }

    /**
     * Display a listing of the AsociacionCamposServicios.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->asociacionCamposServiciosRepository->pushCriteria(new RequestCriteria($request));
        $asociacionCamposServicios = $this->asociacionCamposServiciosRepository->all();

        return view('admin.asociacionCamposServicios.index')
            ->with('asociacionCamposServicios', $asociacionCamposServicios);
    }

    /**
     * Show the form for creating a new AsociacionCamposServicios.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.asociacionCamposServicios.create');
    }

    /**
     * Store a newly created AsociacionCamposServicios in storage.
     *
     * @param CreateAsociacionCamposServiciosRequest $request
     *
     * @return Response
     */
    public function store(CreateAsociacionCamposServiciosRequest $request)
    {
        $input = $request->all();

        $asociacionCamposServicios = $this->asociacionCamposServiciosRepository->create($input);

        Flash::success('AsociacionCamposServicios saved successfully.');

        return redirect(route('admin.asociacionCamposServicios.index'));
    }

    /**
     * Display the specified AsociacionCamposServicios.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $asociacionCamposServicios = $this->asociacionCamposServiciosRepository->findWithoutFail($id);

        if (empty($asociacionCamposServicios)) {
            Flash::error('AsociacionCamposServicios not found');

            return redirect(route('admin.asociacionCamposServicios.index'));
        }

        return view('admin.asociacionCamposServicios.show')->with('asociacionCamposServicios', $asociacionCamposServicios);
    }

    /**
     * Show the form for editing the specified AsociacionCamposServicios.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $asociacionCamposServicios = $this->asociacionCamposServiciosRepository->findWithoutFail($id);

        if (empty($asociacionCamposServicios)) {
            Flash::error('AsociacionCamposServicios not found');

            return redirect(route('admin.asociacionCamposServicios.index'));
        }

        return view('admin.asociacionCamposServicios.edit')->with('asociacionCamposServicios', $asociacionCamposServicios);
    }

    /**
     * Update the specified AsociacionCamposServicios in storage.
     *
     * @param  int              $id
     * @param UpdateAsociacionCamposServiciosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAsociacionCamposServiciosRequest $request)
    {
        $asociacionCamposServicios = $this->asociacionCamposServiciosRepository->findWithoutFail($id);

        if (empty($asociacionCamposServicios)) {
            Flash::error('AsociacionCamposServicios not found');

            return redirect(route('admin.asociacionCamposServicios.index'));
        }

        $asociacionCamposServicios = $this->asociacionCamposServiciosRepository->update($request->all(), $id);

        Flash::success('AsociacionCamposServicios updated successfully.');

        return redirect(route('admin.asociacionCamposServicios.index'));
    }

    /**
     * Remove the specified AsociacionCamposServicios from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $asociacionCamposServicios = $this->asociacionCamposServiciosRepository->findWithoutFail($id);

        if (empty($asociacionCamposServicios)) {
            Flash::error('AsociacionCamposServicios not found');

            return redirect(route('admin.asociacionCamposServicios.index'));
        }

        $this->asociacionCamposServiciosRepository->delete($id);

        Flash::success('AsociacionCamposServicios deleted successfully.');

        return redirect(route('admin.asociacionCamposServicios.index'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateEstadoEnvioRequest;
use App\Http\Requests\Admin\UpdateEstadoEnvioRequest;
use App\Repositories\Admin\EstadoEnvioRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class EstadoEnvioController extends InfyOmBaseController
{
    /** @var  EstadoEnvioRepository */
    private $estadoEnvioRepository;

    public function __construct(EstadoEnvioRepository $estadoEnvioRepo)
    {
        $this->estadoEnvioRepository = $estadoEnvioRepo;
    }

    /**
     * Display a listing of the EstadoEnvio.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->estadoEnvioRepository->pushCriteria(new RequestCriteria($request));
        $estadoEnvios = $this->estadoEnvioRepository->all();

        return view('admin.estadoEnvios.index')
            ->with('estadoEnvios', $estadoEnvios);
    }

    /**
     * Show the form for creating a new EstadoEnvio.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.estadoEnvios.create');
    }

    /**
     * Store a newly created EstadoEnvio in storage.
     *
     * @param CreateEstadoEnvioRequest $request
     *
     * @return Response
     */
    public function store(CreateEstadoEnvioRequest $request)
    {
        $input = $request->all();

        $estadoEnvio = $this->estadoEnvioRepository->create($input);

        Flash::success('EstadoEnvio saved successfully.');

        return redirect(route('admin.estadoEnvios.index'));
    }

    /**
     * Display the specified EstadoEnvio.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $estadoEnvio = $this->estadoEnvioRepository->findWithoutFail($id);

        if (empty($estadoEnvio)) {
            Flash::error('EstadoEnvio not found');

            return redirect(route('admin.estadoEnvios.index'));
        }

        return view('admin.estadoEnvios.show')->with('estadoEnvio', $estadoEnvio);
    }

    /**
     * Show the form for editing the specified EstadoEnvio.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $estadoEnvio = $this->estadoEnvioRepository->findWithoutFail($id);

        if (empty($estadoEnvio)) {
            Flash::error('EstadoEnvio not found');

            return redirect(route('admin.estadoEnvios.index'));
        }

        return view('admin.estadoEnvios.edit')->with('estadoEnvio', $estadoEnvio);
    }

    /**
     * Update the specified EstadoEnvio in storage.
     *
     * @param  int              $id
     * @param UpdateEstadoEnvioRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEstadoEnvioRequest $request)
    {
        $estadoEnvio = $this->estadoEnvioRepository->findWithoutFail($id);

        if (empty($estadoEnvio)) {
            Flash::error('EstadoEnvio not found');

            return redirect(route('admin.estadoEnvios.index'));
        }

        $estadoEnvio = $this->estadoEnvioRepository->update($request->all(), $id);

        Flash::success('EstadoEnvio updated successfully.');

        return redirect(route('admin.estadoEnvios.index'));
    }

    /**
     * Remove the specified EstadoEnvio from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $estadoEnvio = $this->estadoEnvioRepository->findWithoutFail($id);

        if (empty($estadoEnvio)) {
            Flash::error('EstadoEnvio not found');

            return redirect(route('admin.estadoEnvios.index'));
        }

        $this->estadoEnvioRepository->delete($id);

        Flash::success('EstadoEnvio deleted successfully.');

        return redirect(route('admin.estadoEnvios.index'));
    }
}

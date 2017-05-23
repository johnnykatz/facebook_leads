<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateFormularioEnviadoXServicioRequest;
use App\Http\Requests\Admin\UpdateFormularioEnviadoXServicioRequest;
use App\Repositories\Admin\FormularioEnviadoXServicioRepository;
use App\Http\Controllers\Admin\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class FormularioEnviadoXServicioController extends InfyOmBaseController
{
    /** @var  FormularioEnviadoXServicioRepository */
    private $formularioEnviadoXServicioRepository;

    public function __construct(FormularioEnviadoXServicioRepository $formularioEnviadoXServicioRepo)
    {
        $this->formularioEnviadoXServicioRepository = $formularioEnviadoXServicioRepo;
    }

    /**
     * Display a listing of the FormularioEnviadoXServicio.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->formularioEnviadoXServicioRepository->pushCriteria(new RequestCriteria($request));
        $formularioEnviadoXServicios = $this->formularioEnviadoXServicioRepository->all();

        return view('admin.formularioEnviadoXServicios.index')
            ->with('formularioEnviadoXServicios', $formularioEnviadoXServicios);
    }

    /**
     * Show the form for creating a new FormularioEnviadoXServicio.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.formularioEnviadoXServicios.create');
    }

    /**
     * Store a newly created FormularioEnviadoXServicio in storage.
     *
     * @param CreateFormularioEnviadoXServicioRequest $request
     *
     * @return Response
     */
    public function store(CreateFormularioEnviadoXServicioRequest $request)
    {
        $input = $request->all();

        $formularioEnviadoXServicio = $this->formularioEnviadoXServicioRepository->create($input);

        Flash::success('FormularioEnviadoXServicio saved successfully.');

        return redirect(route('admin.formularioEnviadoXServicios.index'));
    }

    /**
     * Display the specified FormularioEnviadoXServicio.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $formularioEnviadoXServicio = $this->formularioEnviadoXServicioRepository->findWithoutFail($id);

        if (empty($formularioEnviadoXServicio)) {
            Flash::error('FormularioEnviadoXServicio not found');

            return redirect(route('admin.formularioEnviadoXServicios.index'));
        }

        return view('admin.formularioEnviadoXServicios.show')->with('formularioEnviadoXServicio', $formularioEnviadoXServicio);
    }

    /**
     * Show the form for editing the specified FormularioEnviadoXServicio.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $formularioEnviadoXServicio = $this->formularioEnviadoXServicioRepository->findWithoutFail($id);

        if (empty($formularioEnviadoXServicio)) {
            Flash::error('FormularioEnviadoXServicio not found');

            return redirect(route('admin.formularioEnviadoXServicios.index'));
        }

        return view('admin.formularioEnviadoXServicios.edit')->with('formularioEnviadoXServicio', $formularioEnviadoXServicio);
    }

    /**
     * Update the specified FormularioEnviadoXServicio in storage.
     *
     * @param  int              $id
     * @param UpdateFormularioEnviadoXServicioRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFormularioEnviadoXServicioRequest $request)
    {
        $formularioEnviadoXServicio = $this->formularioEnviadoXServicioRepository->findWithoutFail($id);

        if (empty($formularioEnviadoXServicio)) {
            Flash::error('FormularioEnviadoXServicio not found');

            return redirect(route('admin.formularioEnviadoXServicios.index'));
        }

        $formularioEnviadoXServicio = $this->formularioEnviadoXServicioRepository->update($request->all(), $id);

        Flash::success('FormularioEnviadoXServicio updated successfully.');

        return redirect(route('admin.formularioEnviadoXServicios.index'));
    }

    /**
     * Remove the specified FormularioEnviadoXServicio from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $formularioEnviadoXServicio = $this->formularioEnviadoXServicioRepository->findWithoutFail($id);

        if (empty($formularioEnviadoXServicio)) {
            Flash::error('FormularioEnviadoXServicio not found');

            return redirect(route('admin.formularioEnviadoXServicios.index'));
        }

        $this->formularioEnviadoXServicioRepository->delete($id);

        Flash::success('FormularioEnviadoXServicio deleted successfully.');

        return redirect(route('admin.formularioEnviadoXServicios.index'));
    }
}

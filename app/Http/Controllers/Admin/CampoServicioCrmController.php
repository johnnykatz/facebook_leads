<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateCampoServicioCrmRequest;
use App\Http\Requests\Admin\UpdateCampoServicioCrmRequest;
use App\Repositories\Admin\CampoServicioCrmRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CampoServicioCrmController extends InfyOmBaseController
{
    /** @var  CampoServicioCrmRepository */
    private $campoServicioCrmRepository;

    public function __construct(CampoServicioCrmRepository $campoServicioCrmRepo)
    {
        $this->campoServicioCrmRepository = $campoServicioCrmRepo;
    }

    /**
     * Display a listing of the CampoServicioCrm.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->campoServicioCrmRepository->pushCriteria(new RequestCriteria($request));
        $campoServicioCrms = $this->campoServicioCrmRepository->all();

        return view('admin.campoServicioCrms.index')
            ->with('campoServicioCrms', $campoServicioCrms);
    }

    /**
     * Show the form for creating a new CampoServicioCrm.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.campoServicioCrms.create');
    }

    /**
     * Store a newly created CampoServicioCrm in storage.
     *
     * @param CreateCampoServicioCrmRequest $request
     *
     * @return Response
     */
    public function store(CreateCampoServicioCrmRequest $request)
    {
        $input = $request->all();

        $campoServicioCrm = $this->campoServicioCrmRepository->create($input);

        Flash::success('CampoServicioCrm saved successfully.');

        return redirect(route('admin.campoServicioCrms.index'));
    }

    /**
     * Display the specified CampoServicioCrm.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $campoServicioCrm = $this->campoServicioCrmRepository->findWithoutFail($id);

        if (empty($campoServicioCrm)) {
            Flash::error('CampoServicioCrm not found');

            return redirect(route('admin.campoServicioCrms.index'));
        }

        return view('admin.campoServicioCrms.show')->with('campoServicioCrm', $campoServicioCrm);
    }

    /**
     * Show the form for editing the specified CampoServicioCrm.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $campoServicioCrm = $this->campoServicioCrmRepository->findWithoutFail($id);

        if (empty($campoServicioCrm)) {
            Flash::error('CampoServicioCrm not found');

            return redirect(route('admin.campoServicioCrms.index'));
        }

        return view('admin.campoServicioCrms.edit')->with('campoServicioCrm', $campoServicioCrm);
    }

    /**
     * Update the specified CampoServicioCrm in storage.
     *
     * @param  int              $id
     * @param UpdateCampoServicioCrmRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCampoServicioCrmRequest $request)
    {
        $campoServicioCrm = $this->campoServicioCrmRepository->findWithoutFail($id);

        if (empty($campoServicioCrm)) {
            Flash::error('CampoServicioCrm not found');

            return redirect(route('admin.campoServicioCrms.index'));
        }

        $campoServicioCrm = $this->campoServicioCrmRepository->update($request->all(), $id);

        Flash::success('CampoServicioCrm updated successfully.');

        return redirect(route('admin.campoServicioCrms.index'));
    }

    /**
     * Remove the specified CampoServicioCrm from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $campoServicioCrm = $this->campoServicioCrmRepository->findWithoutFail($id);

        if (empty($campoServicioCrm)) {
            Flash::error('CampoServicioCrm not found');

            return redirect(route('admin.campoServicioCrms.index'));
        }

        $this->campoServicioCrmRepository->delete($id);

        Flash::success('CampoServicioCrm deleted successfully.');

        return redirect(route('admin.campoServicioCrms.index'));
    }
}

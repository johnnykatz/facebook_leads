<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateServicioCrmRequest;
use App\Http\Requests\Admin\UpdateServicioCrmRequest;
use App\Repositories\Admin\ServicioCrmRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ServicioCrmController extends InfyOmBaseController
{
    /** @var  ServicioCrmRepository */
    private $servicioCrmRepository;

    public function __construct(ServicioCrmRepository $servicioCrmRepo)
    {
        $this->servicioCrmRepository = $servicioCrmRepo;
    }

    /**
     * Display a listing of the ServicioCrm.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->servicioCrmRepository->pushCriteria(new RequestCriteria($request));
        $servicioCrms = $this->servicioCrmRepository->all();

        return view('admin.servicioCrms.index')
            ->with('servicioCrms', $servicioCrms);
    }

    /**
     * Show the form for creating a new ServicioCrm.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.servicioCrms.create');
    }

    /**
     * Store a newly created ServicioCrm in storage.
     *
     * @param CreateServicioCrmRequest $request
     *
     * @return Response
     */
    public function store(CreateServicioCrmRequest $request)
    {
        $input = $request->all();

        $servicioCrm = $this->servicioCrmRepository->create($input);

        Flash::success('ServicioCrm saved successfully.');

        return redirect(route('admin.servicioCrms.index'));
    }

    /**
     * Display the specified ServicioCrm.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $servicioCrm = $this->servicioCrmRepository->findWithoutFail($id);

        if (empty($servicioCrm)) {
            Flash::error('ServicioCrm not found');

            return redirect(route('admin.servicioCrms.index'));
        }

        return view('admin.servicioCrms.show')->with('servicioCrm', $servicioCrm);
    }

    /**
     * Show the form for editing the specified ServicioCrm.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $servicioCrm = $this->servicioCrmRepository->findWithoutFail($id);

        if (empty($servicioCrm)) {
            Flash::error('ServicioCrm not found');

            return redirect(route('admin.servicioCrms.index'));
        }

        return view('admin.servicioCrms.edit')->with('servicioCrm', $servicioCrm);
    }

    /**
     * Update the specified ServicioCrm in storage.
     *
     * @param  int              $id
     * @param UpdateServicioCrmRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateServicioCrmRequest $request)
    {
        $servicioCrm = $this->servicioCrmRepository->findWithoutFail($id);

        if (empty($servicioCrm)) {
            Flash::error('ServicioCrm not found');

            return redirect(route('admin.servicioCrms.index'));
        }

        $servicioCrm = $this->servicioCrmRepository->update($request->all(), $id);

        Flash::success('ServicioCrm updated successfully.');

        return redirect(route('admin.servicioCrms.index'));
    }

    /**
     * Remove the specified ServicioCrm from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $servicioCrm = $this->servicioCrmRepository->findWithoutFail($id);

        if (empty($servicioCrm)) {
            Flash::error('ServicioCrm not found');

            return redirect(route('admin.servicioCrms.index'));
        }

        $this->servicioCrmRepository->delete($id);

        Flash::success('ServicioCrm deleted successfully.');

        return redirect(route('admin.servicioCrms.index'));
    }
}

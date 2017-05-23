<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateCrmRequest;
use App\Http\Requests\Admin\UpdateCrmRequest;
use App\Repositories\Admin\CrmRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CrmController extends InfyOmBaseController
{
    /** @var  CrmRepository */
    private $crmRepository;

    public function __construct(CrmRepository $crmRepo)
    {
        $this->crmRepository = $crmRepo;
    }

    /**
     * Display a listing of the Crm.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->crmRepository->pushCriteria(new RequestCriteria($request));
        $crms = $this->crmRepository->all();

        return view('admin.crms.index')
            ->with('crms', $crms);
    }

    /**
     * Show the form for creating a new Crm.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.crms.create');
    }

    /**
     * Store a newly created Crm in storage.
     *
     * @param CreateCrmRequest $request
     *
     * @return Response
     */
    public function store(CreateCrmRequest $request)
    {
        $input = $request->all();

        $crm = $this->crmRepository->create($input);

        Flash::success('Crm saved successfully.');

        return redirect(route('admin.crms.index'));
    }

    /**
     * Display the specified Crm.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $crm = $this->crmRepository->findWithoutFail($id);

        if (empty($crm)) {
            Flash::error('Crm not found');

            return redirect(route('admin.crms.index'));
        }

        return view('admin.crms.show')->with('crm', $crm);
    }

    /**
     * Show the form for editing the specified Crm.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $crm = $this->crmRepository->findWithoutFail($id);

        if (empty($crm)) {
            Flash::error('Crm not found');

            return redirect(route('admin.crms.index'));
        }

        return view('admin.crms.edit')->with('crm', $crm);
    }

    /**
     * Update the specified Crm in storage.
     *
     * @param  int              $id
     * @param UpdateCrmRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCrmRequest $request)
    {
        $crm = $this->crmRepository->findWithoutFail($id);

        if (empty($crm)) {
            Flash::error('Crm not found');

            return redirect(route('admin.crms.index'));
        }

        $crm = $this->crmRepository->update($request->all(), $id);

        Flash::success('Crm updated successfully.');

        return redirect(route('admin.crms.index'));
    }

    /**
     * Remove the specified Crm from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $crm = $this->crmRepository->findWithoutFail($id);

        if (empty($crm)) {
            Flash::error('Crm not found');

            return redirect(route('admin.crms.index'));
        }

        $this->crmRepository->delete($id);

        Flash::success('Crm deleted successfully.');

        return redirect(route('admin.crms.index'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateLandingRequest;
use App\Http\Requests\Admin\UpdateLandingRequest;
use App\Repositories\Admin\LandingRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class LandingController extends InfyOmBaseController
{
    /** @var  LandingRepository */
    private $landingRepository;

    public function __construct(LandingRepository $landingRepo)
    {
        $this->landingRepository = $landingRepo;
    }

    /**
     * Display a listing of the Landing.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->landingRepository->pushCriteria(new RequestCriteria($request));
        $landings = $this->landingRepository->all();

        return view('admin.landings.index')
            ->with('landings', $landings);
    }

    /**
     * Show the form for creating a new Landing.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.landings.create');
    }

    /**
     * Store a newly created Landing in storage.
     *
     * @param CreateLandingRequest $request
     *
     * @return Response
     */
    public function store(CreateLandingRequest $request)
    {
        $input = $request->all();

        $landing = $this->landingRepository->create($input);

        Flash::success('Landing saved successfully.');

        return redirect(route('admin.landings.index'));
    }

    /**
     * Display the specified Landing.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $landing = $this->landingRepository->findWithoutFail($id);

        if (empty($landing)) {
            Flash::error('Landing not found');

            return redirect(route('admin.landings.index'));
        }

        return view('admin.landings.show')->with('landing', $landing);
    }

    /**
     * Show the form for editing the specified Landing.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $landing = $this->landingRepository->findWithoutFail($id);

        if (empty($landing)) {
            Flash::error('Landing not found');

            return redirect(route('admin.landings.index'));
        }

        return view('admin.landings.edit')->with('landing', $landing);
    }

    /**
     * Update the specified Landing in storage.
     *
     * @param  int              $id
     * @param UpdateLandingRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLandingRequest $request)
    {
        $landing = $this->landingRepository->findWithoutFail($id);

        if (empty($landing)) {
            Flash::error('Landing not found');

            return redirect(route('admin.landings.index'));
        }

        $landing = $this->landingRepository->update($request->all(), $id);

        Flash::success('Landing updated successfully.');

        return redirect(route('admin.landings.index'));
    }

    /**
     * Remove the specified Landing from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $landing = $this->landingRepository->findWithoutFail($id);

        if (empty($landing)) {
            Flash::error('Landing not found');

            return redirect(route('admin.landings.index'));
        }

        $this->landingRepository->delete($id);

        Flash::success('Landing deleted successfully.');

        return redirect(route('admin.landings.index'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateTokenRequest;
use App\Http\Requests\Admin\UpdateTokenRequest;
use App\Providers\FacebookProvider;
use App\Repositories\Admin\TokenRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TokenController extends InfyOmBaseController
{
    /** @var  TokenRepository */
    private $tokenRepository;

    public function __construct(TokenRepository $tokenRepo)
    {
        $this->tokenRepository = $tokenRepo;
    }

    /**
     * Display a listing of the Token.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->tokenRepository->pushCriteria(new RequestCriteria($request));
        $tokens = $this->tokenRepository->all();
        $url = FacebookProvider::fb_login();

        return view('admin.tokens.index')
            ->with('url', $url)
            ->with('tokens', $tokens);
    }

    /**
     * Show the form for creating a new Token.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.tokens.create');
    }

    /**
     * Store a newly created Token in storage.
     *
     * @param CreateTokenRequest $request
     *
     * @return Response
     */
    public function store(CreateTokenRequest $request)
    {
        $input = $request->all();

        $token = $this->tokenRepository->create($input);

        Flash::success('Token saved successfully.');

        return redirect(route('admin.tokens.index'));
    }

    /**
     * Display the specified Token.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $token = $this->tokenRepository->findWithoutFail($id);

        if (empty($token)) {
            Flash::error('Token not found');

            return redirect(route('admin.tokens.index'));
        }

        return view('admin.tokens.show')->with('token', $token);
    }

    /**
     * Show the form for editing the specified Token.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $token = $this->tokenRepository->findWithoutFail($id);

        if (empty($token)) {
            Flash::error('Token not found');

            return redirect(route('admin.tokens.index'));
        }

        return view('admin.tokens.edit')->with('token', $token);
    }

    /**
     * Update the specified Token in storage.
     *
     * @param  int $id
     * @param UpdateTokenRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTokenRequest $request)
    {
        $token = $this->tokenRepository->findWithoutFail($id);

        if (empty($token)) {
            Flash::error('Token not found');

            return redirect(route('admin.tokens.index'));
        }

        $token = $this->tokenRepository->update($request->all(), $id);

        Flash::success('Token updated successfully.');

        return redirect(route('admin.tokens.index'));
    }

    /**
     * Remove the specified Token from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $token = $this->tokenRepository->findWithoutFail($id);

        if (empty($token)) {
            Flash::error('Token not found');

            return redirect(route('admin.tokens.index'));
        }

        $this->tokenRepository->delete($id);

        Flash::success('Token deleted successfully.');

        return redirect(route('admin.tokens.index'));
    }
}

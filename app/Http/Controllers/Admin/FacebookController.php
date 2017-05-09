<?php

namespace App\Http\Controllers\Admin;

use App\Providers\FacebookProvider;
use App\Http\Controllers\Controller;

use Laracasts\Flash\Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class FacebookController extends Controller
{
    public function callback()
    {
        FacebookProvider::callback();
        Flash::success('El Token fue actualizado.');

        return redirect(route('admin.tokens.index'));

    }

    public function destroy($id)
    {
        $formulario = $this->formularioRepository->findWithoutFail($id);

        if (empty($formulario)) {
            Flash::error('Formulario not found');

            return redirect(route('admin.formularios.index'));
        }

        $this->formularioRepository->delete($id);

        Flash::success('Formulario deleted successfully.');

        return redirect(route('admin.formularios.index'));
    }
}

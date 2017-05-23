<?php

namespace App\Repositories\Admin;

use App\Models\Admin\FormularioEnviadoXServicio;
use InfyOm\Generator\Common\BaseRepository;

class FormularioEnviadoXServicioRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return FormularioEnviadoXServicio::class;
    }
}

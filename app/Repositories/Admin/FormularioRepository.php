<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Formulario;
use InfyOm\Generator\Common\BaseRepository;

class FormularioRepository extends BaseRepository
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
        return Formulario::class;
    }
}

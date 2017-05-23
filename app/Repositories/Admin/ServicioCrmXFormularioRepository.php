<?php

namespace App\Repositories\Admin;

use App\Models\Admin\ServicioCrmXFormulario;
use InfyOm\Generator\Common\BaseRepository;

class ServicioCrmXFormularioRepository extends BaseRepository
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
        return ServicioCrmXFormulario::class;
    }
}

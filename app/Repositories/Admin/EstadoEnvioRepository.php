<?php

namespace App\Repositories\Admin;

use App\Models\Admin\EstadoEnvio;
use InfyOm\Generator\Common\BaseRepository;

class EstadoEnvioRepository extends BaseRepository
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
        return EstadoEnvio::class;
    }
}

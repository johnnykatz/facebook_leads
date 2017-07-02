<?php

namespace App\Repositories\Admin;

use App\Models\Admin\LandingsCamposServicio;
use InfyOm\Generator\Common\BaseRepository;

class LandingsCamposServicioRepository extends BaseRepository
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
        return LandingsCamposServicio::class;
    }
}

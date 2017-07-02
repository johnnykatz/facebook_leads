<?php

namespace App\Repositories\Admin;

use App\Models\Admin\LandingsEnviadosXServicio;
use InfyOm\Generator\Common\BaseRepository;

class LandingsEnviadosXServicioRepository extends BaseRepository
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
        return LandingsEnviadosXServicio::class;
    }
}

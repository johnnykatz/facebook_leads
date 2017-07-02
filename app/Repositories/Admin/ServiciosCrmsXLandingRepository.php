<?php

namespace App\Repositories\Admin;

use App\Models\Admin\ServiciosCrmsXLanding;
use InfyOm\Generator\Common\BaseRepository;

class ServiciosCrmsXLandingRepository extends BaseRepository
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
        return ServiciosCrmsXLanding::class;
    }
}

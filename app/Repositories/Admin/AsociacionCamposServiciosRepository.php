<?php

namespace App\Repositories\Admin;

use App\Models\Admin\AsociacionCamposServicios;
use InfyOm\Generator\Common\BaseRepository;

class AsociacionCamposServiciosRepository extends BaseRepository
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
        return AsociacionCamposServicios::class;
    }
}

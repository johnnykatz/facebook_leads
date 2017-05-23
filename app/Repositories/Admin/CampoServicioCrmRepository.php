<?php

namespace App\Repositories\Admin;

use App\Models\Admin\CampoServicioCrm;
use InfyOm\Generator\Common\BaseRepository;

class CampoServicioCrmRepository extends BaseRepository
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
        return CampoServicioCrm::class;
    }
}

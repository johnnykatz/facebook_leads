<?php

namespace App\Repositories\Admin;

use App\Models\Admin\ServicioCrm;
use InfyOm\Generator\Common\BaseRepository;

class ServicioCrmRepository extends BaseRepository
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
        return ServicioCrm::class;
    }
}

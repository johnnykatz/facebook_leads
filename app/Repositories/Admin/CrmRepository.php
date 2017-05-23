<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Crm;
use InfyOm\Generator\Common\BaseRepository;

class CrmRepository extends BaseRepository
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
        return Crm::class;
    }
}

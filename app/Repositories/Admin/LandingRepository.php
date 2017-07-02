<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Landing;
use InfyOm\Generator\Common\BaseRepository;

class LandingRepository extends BaseRepository
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
        return Landing::class;
    }
}

<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Token;
use InfyOm\Generator\Common\BaseRepository;

class TokenRepository extends BaseRepository
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
        return Token::class;
    }
}

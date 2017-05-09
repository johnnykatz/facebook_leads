<?php

namespace App\Models\Admin;

use Eloquent as Model;

/**
 * Class Token
 * @package App\Models\Admin
 */
class Token extends Model
{

    public $table = 'tokens';
    


    public $fillable = [
        'token',
        'expires_at',
        'page_id',
        'page_name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'token' => 'string',
        'expires_at' => 'date',
        'page_id' => 'string',
        'page_name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}

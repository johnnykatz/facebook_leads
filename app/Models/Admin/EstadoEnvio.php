<?php

namespace App\Models\Admin;

use Eloquent as Model;

/**
 * Class EstadoEnvio
 * @package App\Models\Admin
 */
class EstadoEnvio extends Model
{

    public $table = 'estados_envios';
    


    public $fillable = [
        'nombre',
        'slug'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'slug' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}

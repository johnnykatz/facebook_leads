<?php

namespace App\Models\Admin;

use Eloquent as Model;

/**
 * Class Formulario
 * @package App\Models\Admin
 */
class Formulario extends Model
{

    public $table = 'formularios';
    


    public $fillable = [
        'nombre',
        'form_id',
        'activo',
        'con_estructura',
        'db_name',
        'fecha_sincronizacion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'form_id' => 'string',
        'activo' => 'boolean',
        'con_estructura' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'form_id' => 'required|numeric|unique:formularios',

    ];
}

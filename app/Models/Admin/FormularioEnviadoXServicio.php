<?php

namespace App\Models\Admin;

use Eloquent as Model;

/**
 * Class FormularioEnviadoXServicio
 * @package App\Models\Admin
 */
class FormularioEnviadoXServicio extends Model
{

    public $table = 'formularios_enviados_x_servicios';
    


    public $fillable = [
        'formulario_id',
        'servicio_crm_id',
        'registro_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'formulario_id' => 'integer',
        'servicio_crm_id' => 'integer',
        'registro_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}

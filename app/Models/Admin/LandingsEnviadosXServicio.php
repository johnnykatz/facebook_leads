<?php

namespace App\Models\Admin;

use Eloquent as Model;

/**
 * Class LandingsEnviadosXServicio
 * @package App\Models\Admin
 */
class LandingsEnviadosXServicio extends Model
{

    public $table = 'landings_enviados_x_servicios';
    


    public $fillable = [
        'servicios_crm_id',
        'landing_id',
        'estados_envio_id',
        'registro_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'servicios_crm_id' => 'integer',
        'landing_id' => 'integer',
        'estados_envio_id' => 'integer',
        'registro_id' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'registro_id' => 'text'
    ];
}

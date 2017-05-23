<?php

namespace App\Models\Admin;

use Eloquent as Model;

/**
 * Class ServicioCrmXFormulario
 * @package App\Models\Admin
 */
class ServicioCrmXFormulario extends Model
{

    public $table = 'servicios_crms_x_formularios';


    public $fillable = [
        'servicio_crm_id',
        'formulario_id',
        'estado'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'servicio_crm_id' => 'integer',
        'formulario_id' => 'integer',
        'estado' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


    public function formulario()
    {
        return $this->belongsTo('App\Models\Admin\Formulario');
    }

    public function servicioCrm()
    {
        return $this->belongsTo('App\Models\Admin\ServicioCrm');
    }

}

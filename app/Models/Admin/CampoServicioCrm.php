<?php

namespace App\Models\Admin;

use Eloquent as Model;

/**
 * Class CampoServicioCrm
 * @package App\Models\Admin
 */
class CampoServicioCrm extends Model
{

    public $table = 'campos_servicios_crms';


    public $fillable = [
        'nombre',
        'requerido',
        'tipo',
        'servicio_crm_id',
        'estado'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'servicio_crm_id' => 'integer',
        'estado' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


    public function servicioCrm()
    {
        return $this->belongsTo('App\Models\Admin\ServicioCrm');
    }


    public function asociacionesCamposServicios()
    {
        return $this->hasMany('App\Models\Admin\AsociacionCampoServicio');
    }

}

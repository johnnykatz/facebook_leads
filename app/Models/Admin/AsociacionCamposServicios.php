<?php

namespace App\Models\Admin;

use Eloquent as Model;

/**
 * Class AsociacionCamposServicios
 * @package App\Models\Admin
 */
class AsociacionCamposServicios extends Model
{

    public $table = 'asociaciones_campos_servicios';


    public $fillable = [
        'campo_servicio_crm_id',
        'campo_formulario',
        'estado',
        'formulario_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'campo_servicio_crm_id' => 'integer',
        'campo_formulario' => 'string',
        'estado' => 'boolean',
        'formulario_id' => 'integer'
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

    public function campoServicioCrm()
    {
        return $this->belongsTo('App\Models\Admin\CampoServicioCrm');
    }


}

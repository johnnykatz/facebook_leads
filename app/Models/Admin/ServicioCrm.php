<?php

namespace App\Models\Admin;

use Eloquent as Model;

/**
 * Class ServicioCrm
 * @package App\Models\Admin
 */
class ServicioCrm extends Model
{

    public $table = 'servicios_crms';


    public $fillable = [
        'nombre',
        'slug',
        'datos',
        'estado',
        'crm_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'slug' => 'string',
        'datos' => 'string',
        'estado' => 'boolean',
        'crm_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [


    ];

    public function camposServiciosCrms()
    {
        return $this->hasMany('App\Models\Admin\CampoServicioCrm');
    }

    public function serviciosCrmsXFormularios()
    {
        return $this->hasMany('App\Models\Admin\ServicioCrmFormulario');
    }


    public function crm()
    {
        return $this->belongsTo('App\Models\Admin\Crm');
    }

}

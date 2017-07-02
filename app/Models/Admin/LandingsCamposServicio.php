<?php

namespace App\Models\Admin;

use Eloquent as Model;

/**
 * Class LandingsCamposServicio
 * @package App\Models\Admin
 */
class LandingsCamposServicio extends Model
{

    public $table = 'landings_campos_servicios';



    public $fillable = [
        'campo_formulario',
        'campos_servicios_crm_id',
        'landing_id',
        'estado'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'campo_formulario' => 'string',
        'campos_servicios_crm_id' => 'integer',
        'landing_id' => 'integer',
        'estado' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

	public function landing()
	{
		return $this->belongsTo('App\Models\Admin\Landing');
	}

	public function campoServicioCrm()
	{
		return $this->belongsTo('App\Models\Admin\CampoServicioCrm');
	}
}

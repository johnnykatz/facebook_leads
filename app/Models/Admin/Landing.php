<?php

namespace App\Models\Admin;

use Eloquent as Model;

/**
 * Class Landing
 * @package App\Models\Admin
 */
class Landing extends Model
{

    public $table = 'landings';



    public $fillable = [
        'nombre',
        'landing_id',
        'db_name',
        'fecha_sincronizacion',
        'fecha_ultimo_registro',
        'activo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'landing_id' => 'string',
        'db_name' => 'string',
        'fecha_sincronizacion' => 'datetime',
        'fecha_ultimo_registro' => 'datetime',
        'activo' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'landing_id' => 'required',
        'db_name' => 'required'
    ];


	public function serviciosCrmsXLandings()
	{
		return $this->hasMany('App\Models\Admin\ServiciosCrmsXLanding');
	}

	public function landingsCamposServicios()
	{
		return $this->hasMany('App\Models\Admin\LandingsCamposServicio');
	}
}

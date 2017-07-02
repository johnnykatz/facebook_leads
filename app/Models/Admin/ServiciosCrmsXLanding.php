<?php

namespace App\Models\Admin;

use Eloquent as Model;

/**
 * Class ServiciosCrmsXLanding
 * @package App\Models\Admin
 */
class ServiciosCrmsXLanding extends Model
{

    public $table = 'servicios_crms_x_landings';

    public $fillable = [
        'servicios_crm_id',
        'landing_id',
        'estado'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'servicios_crm_id' => 'integer',
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

	public function servicioCrm()
	{
		return $this->belongsTo('App\Models\Admin\ServicioCrm', 'servicios_crm_id');
	}
}

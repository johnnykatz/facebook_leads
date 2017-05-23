<?php

namespace App\Models\Admin;

use Eloquent as Model;

/**
 * Class Crm
 * @package App\Models\Admin
 */
class Crm extends Model
{

    public $table = 'crms';
    


    public $fillable = [
        'nombre',
        'endpoint',
        'estado'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'endpoint' => 'string',
        'estado' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function serviciosCrms()
    {
        return $this->hasMany('App\Models\Admin\ServicioCrm');
    }
}

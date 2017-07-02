<?php

use Illuminate\Database\Seeder;

class LandingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

	    $servicio = [
	    	'nombre' => 'Landing Insert',
		    'slug' => 'landing_insert',
		    'datos' => '#',
		    'estado' => 1,
		    'crm_id' => 1,
		    'campos' => [
		    	[
		    		'nombre'    => 'nombre',
				    'requerido' => true,
				    'tipo'      => 'string',
				    'estado'    => 1
			    ],
			    [
				    'nombre'    => 'email',
				    'requerido' => true,
				    'tipo'      => 'string',
				    'estado'    => 1
			    ],
			    [
				    'nombre'    => 'id_vehiculo',
				    'requerido' => false,
				    'tipo'      => 'string',
				    'estado'    => 1
			    ],
			    [
				    'nombre'    => 'vehiculo',
				    'requerido' => true,
				    'tipo'      => 'string',
				    'estado'    => 1
			    ],
			    [
				    'nombre'    => 'celular',
				    'requerido' => true,
				    'tipo'      => 'string',
				    'estado'    => 1
			    ]
		    ]
	    ];

	    $landings = [
	        [
	        	'nombre'    => 'Interesados',
		        'endpoint'  => 'http://webprojects.rocks/clientes/massdigital/dercontador2017/wordpress/wp-content/plugins/exports-and-reports/api.php?report=3&full=1&action=json&token=5956cef64daa1&export_type=json',
		        'db_name'   => 'landing_interesados',
		        'landing_identificador' => 'id',
		        'activo'    => true,
		        'campos'    => [
			        [
				        'nombre'    => 'nombre',
				        'requerido' => true,
				        'tipo'      => 'string',
				        'estado'    => 1
			        ],
			        [
				        'nombre'    => 'email',
				        'requerido' => true,
				        'tipo'      => 'string',
				        'estado'    => 1
			        ],
			        [
				        'nombre'    => 'id_vehiculo',
				        'requerido' => false,
				        'tipo'      => 'string',
				        'estado'    => 1
			        ],
			        [
				        'nombre'    => 'vehiculo',
				        'requerido' => true,
				        'tipo'      => 'string',
				        'estado'    => 1
			        ],
			        [
				        'nombre'    => 'celular',
				        'requerido' => true,
				        'tipo'      => 'string',
				        'estado'    => 1
			        ]
		        ]
	        ]
	    ];

	    $nuevoServicio = \App\Models\Admin\ServicioCrm::where('slug', 'landing_insert')->first();

	    if(!isset($nuevoServicio)) {
		    $nuevoServicio = \App\Models\Admin\ServicioCrm::create( array_except( $servicio, 'campos' ) );

		    foreach ( $servicio['campos'] as $campo ) {
			    $nuevoServicio->camposServiciosCrms()
			                  ->save( new \App\Models\Admin\CampoServicioCrm( $campo ) );
		    }
	    }

	    foreach ( $landings as $landingData ) {

		    \Illuminate\Support\Facades\DB::transaction(function() use ($landingData, $nuevoServicio) {

		        $campos = $landingData['campos'];
	            $landing = \App\Models\Admin\Landing::create(array_except($landingData, 'campos'));

			    // Crear tabla para el landing
			    \Illuminate\Support\Facades\Schema::create($landing->db_name, function (\Illuminate\Database\Schema\Blueprint $table) use ($campos) {
				    $table->string('id');
				    $table->string('landing_id');
				    $table->string('landing_identificador');

				    foreach ($campos as $campo) {
					    $table->string(\App\Providers\FuncionesProvider::limpiaCadena($campo['nombre']));
				    }

				    $table->timestamps();
			    });

			    // asociar el landing al servicio del crm
			    \App\Models\Admin\ServiciosCrmsXLanding::create(['landing_id' => $landing->id, 'servicios_crm_id' => $nuevoServicio->id, 'estado' => true]);
		    });
	    }


    }
}

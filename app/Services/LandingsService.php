<?php


namespace App\Services;

use App\Models\Admin\Landing;
use App\Models\Admin\ServicioCrm;
use App\Models\Admin\ServiciosCrmsXLanding;
use App\Providers\FuncionesProvider;
use FacebookAds\Exception\Exception;
use GuzzleHttp\Exception\RequestException as GuzzleRequestException;

use DB;
use Log;

class LandingsService
{

    public function __construct($servicio)
    {
        $this->servicio = $servicio = ServicioCrm::where('slug', trim($servicio))
            ->where('estado', true)->first();
    }

    public function obtenerDatos()
    {

	    $serviciosCrmsXLandings = ServiciosCrmsXLanding::where('servicios_crm_id', $this->servicio->id)->get();

	    if (count($serviciosCrmsXLandings) > 0) {
		    foreach ( $serviciosCrmsXLandings as $serviciosCrmsXLanding ) {

			    $landing = $serviciosCrmsXLanding->landing;

			    $campos = DB::select('SELECT COLUMN_NAME
                          FROM INFORMATION_SCHEMA.COLUMNS
                          WHERE table_name ="' . $landing->db_name . '"');
			    $arrayCampos = array();

			    foreach ($campos as $campo) {
				    $arrayCampos[$campo->COLUMN_NAME] = $campo->COLUMN_NAME;
			    }

			    echo 'Landing -> ' . $landing->nombre . "\n";

			    $url = $landing->endpoint;
			    $response = json_decode(file_get_contents($url), true);

			    if(count($response['data']) > 0) {
				    foreach ( $response['data'] as $data ) {

	                      $landing_tmp = DB::table($landing->db_name)
	                        ->select('id')
	                        ->where('landing_identificador', $data[$landing->landing_identificador])
	                        ->first();
	                    if ($landing_tmp) {
	                        continue;
	                    }

                        $fields = array();
	                    $values = array();

	                    $fields[] = 'id';
	                    $values[] = uniqid();

	                    $fields[] = 'landing_identificador';
	                    $values[] = $data['id'];

	                    $fields[] = 'created_at';
	                    $values[] = date("Y-m-d H:i:s");

	                    $fields[] = 'updated_at';
	                    $values[] = date("Y-m-d H:i:s");

	                    $fields[] = 'landing_id';
	                    $values[] = $landing->id;

	                    foreach (array_except($data, [$landing->landing_identificador]) as $k => $val) {
	                    	if(in_array(FuncionesProvider::limpiaCadena($k), $arrayCampos)) {
			                    $fields[] = FuncionesProvider::limpiaCadena( $k );
			                    $values[] = addslashes( (string) $val );
		                    }
	                    }

	                    $valores = "'" . implode("','", $values) . "'";

	                    $sql = DB::insert("insert into " . $landing->db_name . " (" . implode(',', $fields) . ")" . " values (" . $valores . ")");

					}

				    $landing->fecha_sincronizacion = date("Y-m-d H:i:s");
				    $landing->fecha_ultimo_registro = date("Y-m-d H:i:s");
	                $landing->save();
			    }
		    }
	    }

    }


    public function enviarDatos()
    {

    }

    private function sendDatos($data)
    {
        try {
            //$url = $this->servicio->crm->endpoint . '/' . $this->servicio->datos . $data;
            //return json_decode(file_get_contents($url));
	        return false;

        } catch (Exception $e) {
            print "Error" . $e;
            exit;
        }
    }

}

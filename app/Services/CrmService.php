<?php


namespace App\Services;

ini_set('upload_max_filesize', '50M');
ini_set("memory_limit", "1000M");
set_time_limit(0);

use App\Models\Admin\Formulario;
use App\Models\Admin\FormularioEnviadoXServicio;
use App\Models\Admin\ServicioCrm;
use App\Models\Admin\ServicioCrmXFormulario;
use FacebookAds\Exception\Exception;
use GuzzleHttp\Exception\RequestException as GuzzleRequestException;

use DB;
use Log;

class CrmService
{

    public function __construct($servicio)
    {
        $this->servicio = $servicio = ServicioCrm::where('slug', trim($servicio))
            ->where('estado', true)->first();
    }


    public function enviarDatos()
    {
        $serviciosCrmsXformularios = ServicioCrmXFormulario::where('servicio_crm_id', $this->servicio->id)->get();
        if (count($serviciosCrmsXformularios) > 0) {
            foreach ($serviciosCrmsXformularios as $servicioCrmsXformulario) {

                $formulario = $servicioCrmsXformulario->formulario;


                $campos = DB::table('campos_servicios_crms as c')
                    ->join('asociaciones_campos_servicios as a', 'a.campo_servicio_crm_id', '=', 'c.id')
                    ->where('c.servicio_crm_id', '=', $this->servicio->id)
                    ->where('a.formulario_id', '=', $formulario->id)
                    ->where('c.estado', true)
                    ->select('c.nombre as campo_crm', 'a.campo_formulario', 'c.requerido', 'c.tipo', 'codifica')
                    ->get();
                $estructura = array();
                $requeridos = array();
                foreach ($campos as $campo) {
                    $estructura[$campo->campo_formulario] = $campo->campo_crm;
                    $requeridos[$campo->campo_formulario] = $campo->requerido;
                    $tipos[$campo->campo_formulario] = $campo->tipo;
                    $codifica[$campo->campo_formulario] = $campo->codifica;
                }

                $datosFormulario = DB::select('SELECT form.*
                          FROM ' . $formulario->db_name . ' as form
                          LEFT JOIN formularios_enviados_x_servicios as fe on fe.registro_id=form.id
                         where fe.registro_id is null');

                if (count($datosFormulario) > 0) {
                    foreach ($datosFormulario as $dato) {
                        $datosAEnviar = null;
                        $dato = (array)$dato;
                        foreach ($estructura as $key => $campo) {
                            if ($key != "") {
                                //si tiene datos pregunto el tipo para pasarle el correcto
                                if ($tipos[$key] == 'numeric') {
                                    $datoTmp = preg_replace(sprintf('~[^%s]++~i', '0-9'), '', $dato[$key]);
                                    if (isset($datoTmp) and is_numeric($datoTmp)) {
                                        $datosAEnviar .= "&" . $campo . "=" . $datoTmp;
                                    } else {
                                        $datosAEnviar .= "&" . $campo . "=" . (int)"1";
                                    }
                                } else if ($tipos[$key] == 'time_unix') {
                                    $datosAEnviar .= "&" . $campo . "=" . strtotime($dato[$key]);
                                } else {
                                    $datosAEnviar .= "&" . $campo . "=" . urlencode($dato[$key]);
                                }
                            } else if (isset($requeridos[$key]) and $requeridos[$key] == 1) {
                                //si no tiene datos y es requerido pregunto el tipo para asignarle
                                if ($tipos[$key] == 'numeric') {
                                    $datosAEnviar .= "&" . $campo . "=" . (int)"1";
                                } else {
                                    $datosAEnviar .= "&" . $campo . "=null";
                                }
                            } else {
                                //sino tiene datos y no es requerido envio null
                                $datosAEnviar .= "&" . $campo . "=null";
                            }
                        }
                        $response = $this->sendDatos($datosAEnviar);
                        if ($response->resultado->estado == 1) {
                            $enviado = new FormularioEnviadoXServicio();
                            $enviado->formulario_id = $dato['formulario_id'];
                            $enviado->servicio_crm_id = $this->servicio->id;
                            $enviado->registro_id = $dato['id'];
                            $enviado->save();
                        } else {
                            echo "error lead" . $dato['formulario_id'] . " registro " . $dato['id'];
                        }

                    }
                }

            }
        }
    }


    private function sendDatos($data)
    {
        try {
            $url = $this->servicio->crm->endpoint . '/' . $this->servicio->datos . $data;
            return json_decode(file_get_contents($url));

        } catch (Exception $e) {
            print "Error" . $e;
            exit;
        }
    }


}

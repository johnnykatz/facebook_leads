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

        foreach ($serviciosCrmsXformularios as $servicioCrmsXformulario) {

            $formulario = $servicioCrmsXformulario->formulario;

            $estructura = array();
            $campos = DB::table('campos_servicios_crms as c')
                ->join('asociaciones_campos_servicios as a', 'a.campo_servicio_crm_id', '=', 'c.id')
                ->where('c.servicio_crm_id', '=', $this->servicio->id)
                ->where('a.formulario_id', '=', $formulario->id)
                ->where('c.estado', true)
                ->select('c.nombre as campo_crm', 'a.campo_formulario')
                ->get();
            foreach ($campos as $campo) {
                $estructura[$campo->campo_formulario] = $campo->campo_crm;
            }
//            JOIN formularios as f on f.id=form.formulario_id
//                          JOIN servicios_crms
//            $datosFormulario = DB::select('SELECT form.*
//                          FROM ' . $formulario->db_name . ' as form
//                          JOIN servicios_crms_x_formularios as ser on ser.formulario_id=form.formulario_id
//
//                          LEFT JOIN formularios_enviados_x_servicios as fe on fe.registro_id=form.id
//
//
//                 where ser.servicio_crm_id='.$this->servicio->id.' and fe.formulario_id=' . $formulario->id . ' and form.id is null
//
//
//                order by created_time desc');

//            $datosFormulario = DB::select('SELECT form.*
//                          FROM ' . $formulario->db_name . ' as form
//                          LEFT JOIN formularios_enviados_x_servicios as fe on fe.registro_id=form.id
//                          JOIN servicios_crms_x_formularios as ser on ser.formulario_id=form.formulario_id
//
//                         where ser.servicio_crm_id=' . $this->servicio->id . ' and form.formulario_id=' . $formulario->id . ' and fe.registro_id is null');

            $datosFormulario = DB::select('SELECT form.*
                          FROM ' . $formulario->db_name . ' as form    
                            
                         where form.formulario_id=' . $formulario->id . ' and enviado_crm=false limit 30');

//            exit;
            foreach ($datosFormulario as $dato) {
                $datosAEnviar = "&formulario" . "=" . $formulario->nombre;
                $dato = (array)$dato;
                foreach ($estructura as $key => $campo) {
                    $kei = key($estructura);
                    if ($key != "") {
                        $datosAEnviar .= "&" . $campo . "=" . $dato[$key];
                    } else {
                        $datosAEnviar .= "&" . $campo . "=null";
                    }
                }
                $response = $this->sendDatos($datosAEnviar);
                if ($response->estado = 1) {
//                    $enviado = new FormularioEnviadoXServicio();
//                    $enviado->formulario_id = $dato['formulario_id'];
//                    $enviado->servicio_crm_id = $this->servicio->id;
//                    $enviado->registro_id = $dato['id'];
//                    $enviado->save();
                    DB::table($formulario->db_name)
                        ->where('id', $dato['id'])
                        ->update(['enviado_crm' => true]);

                }

            }


        }
    }


    private function sendDatos($data)
    {
        try {
            $url = $this->servicio->crm->endpoint . '/' . $this->servicio->datos . urlencode($data);
            return json_decode(file_get_contents($url));

        } catch (Exception $e) {
            print "Error" . $e;
            exit;
        }
    }


}

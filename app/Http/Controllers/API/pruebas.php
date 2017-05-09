<?php

namespace App\Http\Controllers\API;


use App\Models\Admin\Formulario;
use App\Models\Admin\Token;

use App\Providers\FacebookProvider;
use App\Providers\FuncionesProvider;
use Doctrine\DBAL\Schema\Schema;
use FacebookAds\Api;
use FacebookAds\Object\Page;
use FacebookAds\Object\LeadgenForm;
use FacebookAds\Object\Fields\AdReportRunFields;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use JWTAuth;
use App\User;
use Illuminate\Support\Facades\Validator;
use DB;
use Illuminate\Database\Schema\Blueprint;

class pruebas extends Controller
{
    function prueba()
    {

    }

//    function fb_login()
//    {
//        if (!session_id()) {
//            session_start();
//        }
//
//        $fb = new \Facebook\Facebook([
//            'app_id' => env('APP_ID'),
//            'app_secret' => env('APP_SECRET'),
//            'default_graph_version' => env('API_V'),
//        ]);
//
//        $helper = $fb->getRedirectLoginHelper();
//
//        $permissions = ['manage_pages', 'publish_pages']; // Optional permissions
////        manage_pages y publish_pages
//        $loginUrl = $helper->getLoginUrl('http://localhost:8888/mass-digital/public/callback', $permissions);
////        $loginUrl = $helper->getLoginUrl(route('callback', [$permissions]));
//
//        echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
//    }
//
//    function callback()
//    {
//        if (!session_id()) {
//            session_start();
//        }
//        $fb = new \Facebook\Facebook([
//            'app_id' => env('APP_ID'),
//            'app_secret' => env('APP_SECRET'),
//            'default_graph_version' => env('API_V'),
//        ]);
//
//        $helper = $fb->getRedirectLoginHelper();
//
//        try {
//            $accessToken = $helper->getAccessToken();
//        } catch
//        (\Facebook\Exceptions\FacebookResponseException $e) {
//            // When Graph returns an error
//            echo 'Graph returned an error: ' . $e->getMessage();
//            exit;
//        } catch (\Facebook\Exceptions\FacebookSDKException $e) {
//            // When validation fails or other local issues
//            echo 'Facebook SDK returned an error: ' . $e->getMessage();
//            exit;
//        }
//
//        if (!isset($accessToken)) {
//            if ($helper->getError()) {
//                header('HTTP/1.0 401 Unauthorized');
//                echo "Error: " . $helper->getError() . "\n";
//                echo "Error Code: " . $helper->getErrorCode() . "\n";
//                echo "Error Reason: " . $helper->getErrorReason() . "\n";
//                echo "Error Description: " . $helper->getErrorDescription() . "\n";
//            } else {
//                header('HTTP/1.0 400 Bad Request');
//                echo 'Bad request';
//            }
//            exit;
//        }
//        $token = Token::first();
//        if (!$token) {
//            $token = new Token();
//        }
//        $token->token = $accessToken->getValue();
//        $token->expires_at = $accessToken->getExpiresAt();
//        $token->save();
//// Logged in
//        echo '<h3>Access Token</h3>';
//        var_dump($accessToken->getValue());
//
//// The OAuth 2.0 client handler helps us manage access tokens
//        $oAuth2Client = $fb->getOAuth2Client();
//
//// Get the access token metadata from /debug_token
//        $tokenMetadata = $oAuth2Client->debugToken($accessToken);
//        echo '<h3>Metadata</h3>';
//        var_dump($tokenMetadata);
//
//// Validation (these will throw FacebookSDKException's when they fail)
//        $tokenMetadata->validateAppId(env('APP_ID')); // Replace {app-id} with your app id
//// If you know the user ID this access token belongs to, you can validate it here
////$tokenMetadata->validateUserId('123');
//        $tokenMetadata->validateExpiration();
//
//        if (!$accessToken->isLongLived()) {
//            // Exchanges a short-lived access token for a long-lived one
//            try {
//                $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
//            } catch (\Facebook\Exceptions\FacebookSDKException $e) {
//                echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
//                exit;
//            }
//
//            echo '<h3>Long-lived</h3>';
//            var_dump($accessToken->getValue());
//        }
//
//        $_SESSION['fb_access_token'] = (string)$accessToken;
//
//// User is logged in with a long-lived access token.
//// You can redirect them to a members-only page.
////header('Location: https://example.com/members.php');
//
//    }


    function perfil()
    {

        $token = Token::first();

// Initialize a new Session and instanciate an Api object
        Api::init(env('APP_ID'), env('APP_SECRET'), $token->token);

// The Api object is now available trough singleton
        $api = Api::instance();

        $page = new Page(env('PAGE_ID'));
        $leadgen_forms = $page->getLeadgenForms();

        foreach ($leadgen_forms as $form) {
            $csv = $form->getData();
        }
        $fb = new \Facebook\Facebook([
            'app_id' => '149615715574904', // Replace {app-id} with your app id
            'app_secret' => '78a2570416d3c834f68eeda5d2e39611',
            'default_graph_version' => 'v2.9',
        ]);
        $token = Token::first();
        try {
            // Returns a `Facebook\FacebookResponse` object
            $response = $fb->get('/me?fields=id,name', $token->token);
        } catch (\Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (\Facebook\Exceptions\FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        $user = $response->getGraphUser();

        echo 'Name: ' . $user['name'];
    }

    function formularios()
    {
        $this->conexionFacebook();

        $page = new Page(env('PAGE_ID'));
        $leadgen_forms = $page->getLeadgenForms();

        foreach ($leadgen_forms as $form) {
            $leads = $form->getLeads();
            $csv = $form->getData()['leadgen_export_csv_url'];

            $a = 9;
        }
    }


    function actualizacion()
    {
        $formularios = Formulario::where('con_estructura', true)->where('activo', true)->get();


    }


    function crearEstructura(Request $request)
    {
        $this->conexionFacebook();
        $formulario = Formulario::where('form_id', $request['form_id'])->first();
        $form = new LeadgenForm($request['form_id']);
        $fields = $form->getFields();
        $leads = $form->getLeads();
        foreach ($leads as $lead) {
            $data = $lead->getData();
            $fields = $data['field_data'];
            break;
        }

        try {
            \Illuminate\Support\Facades\Schema::create('form-' . $request['form_id'], function (Blueprint $table) use ($fields) {
                $table->increments('id');
                foreach ($fields as $field) {
                    $table->string(FuncionesProvider::$field['name']);
                }
                $table->timestamps();
            });
        } catch (\Illuminate\Database\QueryException $e) {
            echo implode(',', $e->errorInfo);
        }
        $formulario->db_name = 'form-' . $request['form_id'];
        $formulario->con_estructura = true;
        $formulario->save();

    }


    function sincronizar()
    {
        FacebookProvider::conexionFacebook();
        $formularios = Formulario::where('activo', true)->where('con_estructura', true)->get();
        foreach ($formularios as $formulario) {
            $inicio = true;
            $form = new LeadgenForm($formulario->form_id);
            if ($formulario->fecha_ultimo_lead != null) {
                $leads = $form->getLeads();

//                $time_from = (new \DateTime($formulario->fecha_ultimo_lead))->getTimestamp();
//                $leads = $form->getLeads(array(), array(
//                    AdReportRunFields::FILTERING => array(
//                        array(
//                            'field' => 'time_created',
//                            'operator' => 'GREATER_THAN',
//                            'value' => $time_from,
//                        ),
//                    ),
//
//                ));
            } else {
                $leads = $form->getLeads();
            }

            foreach ($leads as $lead) {
                $data = $lead->getData();

                $lead_tmp = DB::table($formulario->db_name)
                    ->select('id')
                    ->where('lead_id', $data['id'])
                    ->first();
                if ($lead_tmp) {
                    continue;
                }
                $fields = array();
                $values = array();


                $fields[] = 'lead_id';
                $values[] = $data['id'];

                $fields[] = 'created_at';
                $values[] = date("Y-m-d H:i:s");

                $fields[] = 'updated_at';
                $values[] = date("Y-m-d H:i:s");

                $fields[] = 'created_time';
                $values[] = $data['created_time'];

                $fields[] = 'formulario_id';
                $values[] = $formulario->id;


                foreach ($data['field_data'] as $field) {
                    $fields[] = FuncionesProvider::limpiaCadena($field['name']);
                    $values[] = (string)$field['values'][0];
                }
                $valores = "'" . implode("','", $values) . "'";


                $sql = DB::insert("insert into " . $formulario->db_name . " (" . implode(',', $fields) . ")" . " values (" . $valores . ")");
                if ($inicio == true) {
                    $formulario->fecha_ultimo_lead = $lead->created_time;
                    $formulario->save();
                    $inicio = false;
                }
            }

            $formulario->fecha_sincronizacion = date("Y-m-d H:i:s");
            if ($inicio == false) {
                $formulario->fecha_ultimo_lead = $lead->created_time;
            }
            $formulario->save();

        }

    }


}

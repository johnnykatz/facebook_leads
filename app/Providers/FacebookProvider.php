<?php

namespace App\Providers;

use App\Models\Admin\Formulario;
use FacebookAds\Api;
use App\Models\Admin\Token;

use FacebookAds\Object\Page;
use FacebookAds\Object\LeadgenForm;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;

class FacebookProvider
{
    public static function conexionFacebook()
    {
        $token = Token::first();
        Api::init(env('APP_ID'), env('APP_SECRET'), $token->token);
    }

    public static function fb_login()
    {
        if (!session_id()) {
            session_start();
        }

        $fb = new \Facebook\Facebook([
            'app_id' => env('APP_ID'),
            'app_secret' => env('APP_SECRET'),
            'default_graph_version' => env('API_V'),
        ]);

        $helper = $fb->getRedirectLoginHelper();

        $permissions = ['manage_pages', 'publish_pages']; // Optional permissions
//        manage_pages y publish_pages
        $loginUrl = $helper->getLoginUrl(url('callback'), $permissions);
//        $loginUrl = $helper->getLoginUrl('http://localhost:8888/mass-digital/public/callback', $permissions);
//        $loginUrl = $helper->getLoginUrl(route('callback', [$permissions]));

        return htmlspecialchars($loginUrl);
    }

    public static function callback()
    {
        if (!session_id()) {
            session_start();
        }
        $fb = new \Facebook\Facebook([
            'app_id' => env('APP_ID'),
            'app_secret' => env('APP_SECRET'),
            'default_graph_version' => env('API_V'),
        ]);

        $helper = $fb->getRedirectLoginHelper();

        try {
            $accessToken = $helper->getAccessToken();
        } catch
        (\Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (\Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        if (!isset($accessToken)) {
            if ($helper->getError()) {
                header('HTTP/1.0 401 Unauthorized');
                echo "Error: " . $helper->getError() . "\n";
                echo "Error Code: " . $helper->getErrorCode() . "\n";
                echo "Error Reason: " . $helper->getErrorReason() . "\n";
                echo "Error Description: " . $helper->getErrorDescription() . "\n";
            } else {
                header('HTTP/1.0 400 Bad Request');
                echo 'Bad request';
            }
            exit;
        }

// Logged in
//        echo '<h3>Access Token</h3>';
//        var_dump($accessToken->getValue());

// The OAuth 2.0 client handler helps us manage access tokens
        $oAuth2Client = $fb->getOAuth2Client();

// Get the access token metadata from /debug_token
        $tokenMetadata = $oAuth2Client->debugToken($accessToken);
//        echo '<h3>Metadata</h3>';
//        var_dump($tokenMetadata);

// Validation (these will throw FacebookSDKException's when they fail)
        $tokenMetadata->validateAppId(env('APP_ID')); // Replace {app-id} with your app id
// If you know the user ID this access token belongs to, you can validate it here
//$tokenMetadata->validateUserId('123');
        $tokenMetadata->validateExpiration();

        if (!$accessToken->isLongLived()) {
            // Exchanges a short-lived access token for a long-lived one
            try {
                $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
            } catch (\Facebook\Exceptions\FacebookSDKException $e) {
                echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
                exit;
            }

//            echo '<h3>Long-lived</h3>';
//            var_dump($accessToken->getValue());
        }

        $token = Token::first();
        if (!$token) {
            $token = new Token();
        }
        $token->token = $accessToken->getValue();
        $token->expires_at = $accessToken->getExpiresAt();
        $token->save();

        $_SESSION['fb_access_token'] = (string)$accessToken;


// User is logged in with a long-lived access token.
// You can redirect them to a members-only page.
//header('Location: https://example.com/members.php');

    }


    public function sincronizarLeads()
    {
        echo " Comienza sincronizacion" . chr(10) . chr(13);;
        $this::conexionFacebook();
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
                    $values[] = FuncionesProvider::limpiaCadena((string)$field['values'][0]);
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
        echo " Termina sincronizacion" . chr(10) . chr(13);;


    }


    public function sincronizarEstructura()
    {

        FacebookProvider::conexionFacebook();

        $formularios = Formulario::where('activo', true)->where('con_estructura', false)->get();
        foreach ($formularios as $formulario) {
            $form = new LeadgenForm($formulario->form_id);
            $fields = $form->getFields();
            $leads = $form->getLeads();

            foreach ($leads as $lead) {
                $data = $lead->getData();
                $fields = $data['field_data'];
                break;
            }

            try {
                \Illuminate\Support\Facades\Schema::create('form_' . $formulario->form_id, function (Blueprint $table) use ($fields) {
                    $table->increments('id');
                    $table->string('lead_id');
                    $table->dateTime('created_time');
                    $table->string('formulario_id');

                    foreach ($fields as $field) {
                        $table->string(FuncionesProvider::limpiaCadena($field['name']));
                    }
                    $table->timestamps();
                });
            } catch (\Illuminate\Database\QueryException $e) {
                echo implode(',', $e->errorInfo);
            }
            $datosForm = $form->read();

            $formulario->db_name = 'form_' . $formulario->form_id;
            $formulario->con_estructura = true;
            $formulario->nombre = $datosForm->name;
            $formulario->save();
        }

    }

}

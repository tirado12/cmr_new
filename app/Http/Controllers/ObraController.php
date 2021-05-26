<?php

namespace App\Http\Controllers;

use App\Custom\Ejemplo as CustomNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ObraController extends Controller
{
    //
    function sendMessage() {
        $content      = array(
            "en" => 'English Message'
        );
        $hashes_array = array();
        array_push($hashes_array, array(
            "id" => "like-button",
            "text" => "Like",
            "icon" => "http://i.imgur.com/N8SN8ZS.png",
            "url" => "https://yoursite.com"
        ));
        array_push($hashes_array, array(
            "id" => "like-button-2",
            "text" => "Like2",
            "icon" => "http://i.imgur.com/N8SN8ZS.png",
            "url" => "https://yoursite.com"
        ));
        $fields = array(
            'app_id' => "c1bfe080-0e68-4974-97e2-914afc5b7501",
            'included_segments' => array(
                'Subscribed Users'
            ),
            'data' => array(
                "foo" => "bar"
            ),
            'contents' => $content,
            'web_buttons' => $hashes_array
        );
        
        $fields = json_encode($fields);
        print("\nJSON sent:\n");
        print($fields);
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json; charset=utf-8',
            'Authorization: Basic OWQzZThjY2ItOWE0Zi00YWRkLWIzNTUtNDFhOGY2MjY0MDVl'
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        
        $response = curl_exec($ch);
        curl_close($ch);
        
        return $response;
    }
    
    public function getObrasCliente($cliente_id, $anio){
        $response = new CustomNotification();
        $response1 =  $response->sendMessage('HOLA MUNDO JAJAJA', '0b3fda2a-3f3d-4ffb-99ce-f91fa37ed078');
        $return["allresponses"] = $response1;
        $return = json_encode($return);
        
        $data = json_decode($response1, true);
        print_r($data);
        $id = $data['id'];
        print_r($id);

        print("\n\nJSON received:\n");
        print($return);
        print("\n");
        $obras = DB::table('fuentes_clientes')
            ->orWhere(function($query) use($cliente_id, $anio) {
                $query->where('cliente_id', $cliente_id)
                    ->where('ejercicio',$anio);
            })
            ->join('obras_fuentes', 'obras_fuentes.fuente_financiamiento_cliente_id', '=', 'fuentes_clientes.id_fuente_financ_cliente')
            ->join('obras', 'obras.id_obra', '=', 'obras_fuentes.obra_id')
            ->select('obras.nombre_obra','obras.monto_contratado','obras.monto_modificado','obras.avance_tecnico', 'acta_integracion_consejo', 'acta_priorizacion', 'adendum_priorizacion', 'obras.modalidad_ejecucion', 'obras.id_obra')
            ->get();
        return $obras;
    }
    public function getProdim($cliente_id, $anio){

        $obras = DB::table('fuentes_clientes')
            ->orWhere(function($query) use($cliente_id, $anio) {
                $query->where('cliente_id', $cliente_id)
                    ->where('ejercicio',$anio);
            })
            ->select('prodim','gastos_indirectos')
            ->get();
        return $obras;
    }    
}

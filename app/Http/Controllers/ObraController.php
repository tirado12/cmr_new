<?php

namespace App\Http\Controllers;

use App\Custom\Ejemplo as CustomNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ObraController extends Controller
{
    //
    
    public function getObrasCliente($cliente_id, $anio){

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

    public function sendMessage($mensaje, $id){
        $response = new CustomNotification();
        $response1 =  $response->sendMessage($mensaje, $id);
        $return["allresponses"] = $response1;
        $return = json_encode($return);
        
        $data = json_decode($response1, true);
        print_r($data);
        $id = $data['id'];
        print_r($id);

        print("\n\nJSON received:\n");
        print($return);
        print("\n");
    }
    public function getProdim($cliente_id, $anio){
        $obras = DB::table('fuentes_clientes')
        ->orWhere(function($query) use($cliente_id, $anio) {
            $query->where('cliente_id', $cliente_id)
                ->where('ejercicio',$anio)
                ->where('fuente_financiamiento_id',2);
        })
        ->select('prodim','gastos_indirectos')
        ->get();
        return $obras;
        
    }    
}

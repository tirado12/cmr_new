<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ObraModalidadEjecucionController extends Controller
{
    //
    public function getObraExpediente($obra_id){

        $obras = DB::table('obra_modalidad_ejecucion')->where('obra_id',$obra_id)->first();
        $obra_social = DB::table('parte_social_tecnica')->where('id_parte_social_tecnica',$obras->parte_social_tecnica_id)->get();
        $obra = DB::table('obras')->where('id_obra',$obras->obra_id)->first();
        $observaciones = DB::table('obra_observaciones')->where('obra_id',$obras->obra_id)->get();
        $fondo = DB::table('obras_fuentes')->where('obra_id',$obras->obra_id)
        ->join('fuentes_clientes', 'fuentes_clientes.id_fuente_financ_cliente', '=', 'obras_fuentes.fuente_financiamiento_cliente_id')
        ->join('fuentes_financiamientos', 'fuentes_financiamientos.id_fuente_financiamiento', '=', 'fuentes_clientes.fuente_financiamiento_id')->select('nombre_corto', 'monto')->get();
        $obra_est = null; $obra_facturas = null; $obra_lista = null; $contratos = null;
        if($obras->obra_administracion_id == null){
            $obra_est = DB::table('estimaciones')->where('obra_contrato_id',$obras->obra_contrato_id)->get();
            $obra_exp = DB::table('obras_contrato')->where('id_obra_contrato',$obras->obra_contrato_id)->get();
            
        }else {
            $obra_exp = DB::table('obras_administracion')->where('id_obra_administracion',$obras->obra_administracion_id)->get();
            $obra_facturas = DB::table('facturas')->where('obra_administracion_id',$obras->obra_administracion_id)->get();
            $obra_lista = DB::table('contrato_lista_raya')->where('obra_administracion_id',$obras->obra_administracion_id)->get();
            $contratos = DB::table('contratos_arrendamientos')->where('obra_administracion_id',$obras->obra_administracion_id)->get();

        }
        if($obra->modalidad_ejecucion < 3 ){
            $obra_licitacion = DB::table('licitacion_invitacion')->where('obra_contrato_id',$obras->obra_contrato_id)->get();
        }
        $resources = array(
            'parte_social' => $obra_social,
            'obra_exp' => $obra_exp,
            'obra' => $obra,
            'obra_licitacion' => $obra_licitacion,
            'obra_estimacion' => $obra_est,
            'obra_facturas' => $obra_facturas,
            'obra_lista' => $obra_lista,
            'fondo' => $fondo,
            'arrendamientos' =>$contratos,
            'observaciones' => $observaciones
            );
        return [$resources]/*[ejemplo$obra_social, $obra_exp, $obra, $obra_licitacion, $obra_est, $obra_facturas, $obra_lista]*/;
    }
}

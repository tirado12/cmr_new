<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ObraModalidadEjecucionController extends Controller
{
    //
    public function getObraExpediente($obra_id){

        $obras = DB::table('obra_modalidad_ejecucion')->where('obra_id',$obra_id)->first();
        $obra_social = DB::table('parte_social_tecnica')->where('id_parte_social_tecnica',$obras->parte_social_tecnica_id)->first();
        $obra = DB::table('obras')->where('id_obra',$obras->obra_id)->first();
        $obra_est = null; $obra_facturas = null; $obra_lista = null;
        if($obras->obra_administracion_id == null){
            $obra_est = DB::table('estimaciones')->where('obra_contrato_id',$obras->obra_contrato_id)->first();
            $obra_exp = DB::table('obras_contrato')->where('id_obra_contrato',$obras->obra_contrato_id)->first();
            
        }else {
            $obra_exp = DB::table('obras_administracion')->where('id_obra_administracion',$obras->obra_administracion_id)->first();
            $obra_facturas = DB::table('facturas')->where('obra_administracion_id',$obras->obra_administracion_id)->first();
            $obra_lista = DB::table('contrato_lista_raya')->where('obra_administracion_id',$obras->obra_administracion_id)->first();

        }
        if($obra->modalidad_ejecucion < 3 ){
            $obra_licitacion = DB::table('licitacion_invitacion')->where('obra_contrato_id',$obras->obra_contrato_id)->first();
        }
        
        return [$obras, $obra_social, $obra_exp, $obra, $obra_licitacion, $obra_est, $obra_facturas, $obra_lista];
    }
}

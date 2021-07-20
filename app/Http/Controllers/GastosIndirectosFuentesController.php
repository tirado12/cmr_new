<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GastosIndirectosFuentesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "gastos indirectos fuentes";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  User  $users
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        
    }
    // ================= Funciones API ====================== //
    public function getDesgloseGI($cliente_id, $anio){

        $fuente_gi = DB::table('fuentes_clientes')
            ->orWhere(function($query) use($cliente_id, $anio) {
                $query->where('cliente_id', $cliente_id)
                    ->where('ejercicio',$anio)
                    ->where('fuente_financiamiento_id',2);
            })
            ->join('fuentes_gastos_indirectos', 'fuentes_gastos_indirectos.fuente_cliente_id', '=', 'id_fuente_financ_cliente')
            ->join('gastos_indirectos','gastos_indirectos.id_indirectos','=','indirectos_id')
            ->select('nombre','monto')
            ->get();

        return $fuente_gi;
    }
}

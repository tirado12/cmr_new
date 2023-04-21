<?php

namespace App\Http\Controllers;

use App\Models\IntegrantesCabildo;
use App\Models\Municipio;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;
use Illuminate\Support\Facades\DB;

class IntegrantesCabildoController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $integrantes = IntegrantesCabildo::join('clientes','clientes.id_cliente','=','integrantes_cabildo.cliente_id')
        ->join('municipios', 'municipios.id_municipio', '=', 'clientes.municipio_id')
        ->select('integrantes_cabildo.*','municipios.nombre as nombre_municipio')
        ->orderBy('nombre_municipio')
        ->get();
        $municipios = Municipio::all();
        $clientes = Cliente::with('municipio')->get();
        
       return view('cabildo.index',compact('integrantes','municipios', 'clientes'));
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
        $request->validate([
            'nombre' => 'required',
            'cargo' => 'required',
            'telefono' => 'required',
            'correo' => 'required',
            'rfc' => 'required',
            'cliente' => 'required'
        ]);

        $mensaje = 'ok';
        $datos = ['success', '¡PROCESO EXITOSO!', 'Se guardo correctamente la información del Integrante del Cabildo'];
        
        DB::beginTransaction();
        try {

            IntegrantesCabildo::create([
                'nombre' => $request->nombre,
                'cargo' => $request->cargo,
                'telefono' => $request->telefono,
                'correo' => $request->correo,
                'rfc' => strtoupper($request->rfc),
                'cliente_id' => $request->cliente
            ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            $datos = ['error', '¡ERROR!', 'La información no se actualizó correctamente'];
        }
        /*if(auth()->user()->getRoleNames()[0] == 'Administrador')
            return redirect()->route('cabildo.index');
        else*/

        return redirect()->route('cliente.ver', ['id' => $request->cliente])->with('mensaje', 'ok')->with('datos', $datos);
        
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
    public function edit(IntegrantesCabildo $integrante)
    {
        

        if(auth()->user()->getRoleNames()[0] == 'Administrador'){
            $clientes = Cliente::with('municipio')->get();
            return view('cabildo.edit',compact('integrante','clientes'));
        }
        else{
            $cliente = Cliente::find($integrante->cliente_id)
            ->join('municipios', 'municipios.id_municipio', '=', 'clientes.municipio_id')
            ->first();
            return view('cabildo.edit',compact('integrante','cliente'));
        }
        
        
        
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IntegrantesCabildo $integrante)
    {

        return $integrante;
        $request->validate([
            'nombre' => 'required',
            'cargo' => 'required',
            'telefono' => 'required',
            'correo' => 'required',
            'rfc' => 'required',
            'cliente' => 'required'
        ]);
        $integrante->update($request->all());
        if(auth()->user()->getRoleNames()[0] == 'Administrador')
            return redirect()->route('cabildo.index');
        else
            return redirect()->route('cliente.ver', ['id' => $request->cliente]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(IntegrantesCabildo $integrante)
    {
        $integrante->delete();
        return redirect()->route('cabildo.index')->with('eliminar','ok');
    }
}

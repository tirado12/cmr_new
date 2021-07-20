<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\User;
use CreateEstadoTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "clientes";
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
    public function edit(User $user)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        
    }

    // ============================= Funciones API ============================= //

    public function getCliente($id){
        $cliente = Cliente::where('id_cliente', $id)->join('municipios', 'municipios.id_municipio', '=', 'clientes.municipio_id')->join('distritos',  'distrito_id','=', 'distritos.id_distrito')->select('id_cliente', 'rfc', 'direccion', 'distritos.nombre as nombre_distrito', 'municipios.nombre as nombre_municipio','municipios.id_municipio as clave', 'anio_inicio', 'anio_fin', 'logo')->get();
        return $cliente;
    }

    public function getUsuario($user, $password, $id_OneSignal){
        $user = strtolower($user);   
        $user = User::where('name',$user)->first();
        if($user != null) {
            //$password_dc = Crypt::decrypt($user->password);
            //$correcta = strcmp($password_dc, $password) == 0;
        if (Hash::check($password, $user->password)) {
            if($password == null) {
                return null;
            }else {
                $cliente = Cliente::where('user_id', $user->id)->join('users', 'users.id', '=', 'clientes.user_id')->select('id_cliente', 'remember_token')->get();
                $cliente_up = Cliente::find($cliente[0]->id_cliente);
                $cliente_up->id_onesignal = $id_OneSignal;
                $cliente_up->save();
                return $cliente;
            }
        }
        }else {
            return null;
        }
    }
    public function getUsuarioToken($token){
        $user = User::where('remember_token',$token)->first();
        if($user != null) {
            $cliente = Cliente::where('user_id', $user->id)->join('users', 'users.id', '=', 'clientes.user_id')->select('id_cliente', 'remember_token')->get();
            return $cliente;
        }else {
            return null;
        }
    }

}

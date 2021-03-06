<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\User;
use CreateEstadoTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ClienteController extends Controller
{
    //

    public function getCliente($id){
        $cliente = Cliente::where('id_cliente', $id)->first();
        return response()->json($cliente,200);
    }

    public function getUsuario($user, $password){
        $user = User::where('name',$user)->first();
        if($user != null) {
            $password_dc = Crypt::decrypt($user->password);
            $correcta = strcmp($password_dc, $password) == 0;
            if($correcta == null) {
                return 0;
            }else {
                $cliente = Cliente::where('user_id', $user->id)->join('municipios', 'municipios.id_municipio', '=', 'clientes.municipio_id')->get();
                return $cliente;
            }
            
        }else {
            return 0;
        }
    }

}

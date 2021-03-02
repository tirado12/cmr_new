<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use CreateEstadoTable;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    //
    public function index(){
        $estado = Estado::paginate();
        return $estado;
    }
}

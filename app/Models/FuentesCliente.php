<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FuentesCliente extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'monto_proyectado',
        'monto_comprometido',
        'ejercicio',
        'cliente_id',
        'fuente_financiamiento_id'
    ];
}

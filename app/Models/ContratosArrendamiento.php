<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContratosArrendamiento extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_contrato_arrendamiento',
        'fecha_inicio',
        'fecha_fin',
        'fecha_contrato',
        'monto_contratado',
        'obra_administracion_id',
        'proveedor_id'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContratoFactura extends Model
{
    use HasFactory;

    protected $fillable = [
        'factura_id',
        'contrato_arrendamiento_id'
    ];
}

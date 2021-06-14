<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_factura';
    protected $table = "facturas";

    protected $fillable = [
        'folio_fiscal',
        'concepto',
        'fecha',
        'proveedor_id',
        'obra_administracion_id'
    ];
}

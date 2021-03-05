<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estimacione extends Model
{
    use HasFactory;

    protected $table = "estimaciones";

    protected $fillable = [
        'numero_estimacion',
        'total_estimacion',
        'supervicion_obra',
        'mano_obra',
        'cinco_millar',
        'dos_millar',
        'fecha_inicio',
        'fecha_final',
        'fecha_estimacion',
        'folio_factura',
        'caratula_estimacion',
        'presupuesto_estimacion',
        'cuerpo_estimacion',
        'numero_generadores_estimacion',
        'resumen_estimacion',
        'estado_cuenta_estimacion',
        'croquis_ilustrativo_estimacion',
        'reporte_fotografico_estimacion',
        'obra_contrato_id'
    ];
}

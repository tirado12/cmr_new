<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObrasContrato extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_obra_contrato';

    protected $table = "obras_contrato";

    protected $fillable = [
        'contrato',
        'oficio_justificativo_convenio_modificatorio',
        'analisis_p_u',
        'catalogo_conceptos',
        'montos_mensuales_ejecutados',
        'calendario_trabajos_ejecutados',
        'oficio_superintendente',
        'oficio_residente_obra',
        'oficio_disposicion_inmueble',
        'oficio_inicio_obra',
        'factura_anticipo',
        'fianza_anticipo',
        'fianza_cumplimiento',
        'fianza_v_o',
        'aviso_terminacion_obra',
        'acta_entrega_contratista',
        'acta_entrega_municipio',
        'saba_finiquito',
        'notas_bitacoras',
        'modalidad_asignacion',
        'nombre_localidad',
        'tipo_localidad',
        'contratista_id'
    ];
}

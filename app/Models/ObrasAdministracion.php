<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObrasAdministracion extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_obra_administracion';

    protected $table = "obras_administracion";

    protected $fillable = [
        'inventario_maquinaria_construccion',
        'identificacion_oficial_trabajadores',
        'reporte_fotografico',
        'notas_bitacora',
        'acta_entrega_municipio',
        'cedula_detallada_facturacion'
    ];
    
}

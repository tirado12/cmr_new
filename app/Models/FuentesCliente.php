<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FuentesCliente extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_fuente_financ_cliente';
    protected $table = "fuentes_clientes";
    
    protected $fillable = [
        'monto_proyectado',
        'monto_comprometido',
        'acta_integracion_consejo',
        'acta_priorizacion',
        'adendum_priorizacion',
        'prodim',
        'gastos_indirectos',
        'ejercicio',
        'cliente_id',
        'fuente_financiamiento_id'
    ];

    public function cliente(){
        return $this->hasOne(Cliente::class, 'id_cliente', 'cliente_id'); //arg1 - Model, arg2 - foreign key
    }
    public function fuente(){
        return $this->hasOne(FuentesFinanciamiento::class, 'id_fuente_financiamiento', 'fuente_financiamiento_id'); //arg1 - Model, arg2 - foreign key
    }
}

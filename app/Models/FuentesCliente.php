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

    public function clientes(){
        return $this->belongsTo(Cliente::class, 'cliente_id'); //arg1 - Model, arg2 - foreign key
    }
    public function fuente(){
        return $this->hasMany(FuentesFinanciamiento::class, 'id_fuente_financiamiento', 'fuente_financiamiento_id'); //arg1 - Model, arg2 - foreign key
    }

    public function sisplade(){
        return $this->hasMany(Sisplade::class,'fuentes_clientes_id','id_fuente_financ_cliente');
    }

    public function gastosIndirectos(){
        return $this->hasMany(GastosIndirectosFuentes::class,'id_fuentes_gastos_indirectos','id_fuente_financ_cliente');
    }

   
}

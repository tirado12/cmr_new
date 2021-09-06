<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_municipio';
    
    protected $table = "municipios";

    protected $fillable = [
        'nombre',
        'rfc',
        'direccion',
        'distrito_id'
    ];

    public function cliente() {
        return $this->hasMany(Cliente::class, 'municipio_id','id_municipio'); //arg1 - Model, arg2 - foreign key
    }
    public function distrito(){
        return $this->hasOne(Distrito::class, 'id_distrito', 'distrito_id'); //arg1 - Model, arg2 - foreign key
    }
    public function recurso(){
        return $this->hasManyThrough(FuentesCliente::class,Cliente::class,'municipio_id','cliente_id','id_municipio','id_cliente');
    }
}

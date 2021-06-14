<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_comprometido';

    protected $table = "proveedores";

    protected $fillable = [
        'rfc',
        'razon_social'
    ];
}

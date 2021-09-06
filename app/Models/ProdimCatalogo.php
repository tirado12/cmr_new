<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdimCatalogo extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_prodim_catalogo';

    protected $table = "prodim_catalogo";

    protected $fillable = [
        'clave',
        'nombre',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FuentesFinanciamiento extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_largo',
        'nombre_corto'
    ];
}

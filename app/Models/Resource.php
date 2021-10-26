<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

    // Habilitar asignacion masiva
    protected $guarded = ['id'];

    // Declaracion de tabla polimorfica
    public function resourceable(){
        return $this->morphTo();
    }
}

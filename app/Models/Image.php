<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    // Habilitar asignacion masiva
    protected $guarded = ['id'];

    // Declaracion de tabla polimorfica
    public function imageable(){
        return $this->morphTo();
    }
}

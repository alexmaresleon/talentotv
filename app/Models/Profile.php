<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    // Habilitar asignacion masiva
    protected $guarded = ['id'];

    // Inverse 1 to 1
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}

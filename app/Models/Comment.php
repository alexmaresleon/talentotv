<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // Habilitar asignacion masiva
    protected $guarded = ['id'];

    // Declaracion de tabla polimorfica
    public function commentable(){
        return $this->morphTo();
    }

    // Relacion uno a muchos inversa
    public function user(){
        return $this->belongsTo('App\Models\User');

    }

    // Relacion uno a muchos polimorfica
    public function comments(){
        return $this->morphToMany('App\models\Comment', 'commentable');
    }
    
    public function reactions(){
        return $this->morphToMany('App\models\Reaction', 'reactionable');
    } 
}

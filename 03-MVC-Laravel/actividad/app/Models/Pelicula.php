<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    use HasFactory;


    protected $fillable = [
        'anio',
        'titulo',
        'duracion',
        'sipnosis',
        'imagen',
        'favorito'
    ];


    protected $casts = [
        'favorito' => 'boolean'
    ];


    public function actorprincipal() {
        $this->belongsTo(Actor::class);
    }
}

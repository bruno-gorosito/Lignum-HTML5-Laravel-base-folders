<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;


    protected $fillable = [
        'nombre',
        'fecha_nacimiento'
    ];

    public function peliculas() {
        $this->hasMany(Pelicula::class);
    }

}

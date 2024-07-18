<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $table = 'Movie';

    protected $fillable = [
        'MovieID',
        'MovieTitle',
        'MovieLength',
        'MovieYear',
        'ActorPrincipalID'
    ];


    public function actorPrincipal(){
        return $this->belongsTo(Actor::class, 'ActorPrincipalID', 'ActorID');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Actor extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $primaryKey = 'ActorID';
    protected $table = 'Actor';

    protected $fillable = [
        'ActorID',
        'ActorName',
        'ActorBirthday'
    ];

    public function movies()
    {
        return $this->hasMany(Movie::class, 'ActorPrincipalID', 'ActorID');
    }
}

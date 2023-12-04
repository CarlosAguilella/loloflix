<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;
    public $fillable = [
        'title',
        'description',
        'ticket_price',
        'release_year',
    ];

    public function generos(){
        return $this->belongsToMany(Genero::class);
    }

    public function users_liked(){
        return $this->belongsToMany(User::class, 'users_films_like');
    }
}

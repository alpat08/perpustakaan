<?php

namespace App\Models;

use App\Models\Genre;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = "bukus";

    protected $guarded = ['id'];
    
    public function genres() 
    {
        return $this->belongsToMany(Genre::class, 'genre_buku');
    }
}

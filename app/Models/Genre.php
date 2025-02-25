<?php

namespace App\Models;

use App\Models\Buku;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Genre extends Model
{
    use HasFactory;

    protected $table = 'genres';

    protected $fillable = ['name'];

    public function bukus() {
        return $this->belongsToMany(Buku::class, 'genre_buku');
    }
}

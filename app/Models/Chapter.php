<?php

namespace App\Models;

use App\Models\Buku;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chapter extends Model
{
    use HasFactory;

    protected $table = 'chapters';

    protected $fillable = ['name'];

    public function bukus() {
        return $this->belongsToMany(Buku::class, 'chapter_buku');
    }

    public function ceritas() {
        return $this->belongsToMany(Cerita::class,'cerita_chapter');
    }
}

<?php

namespace App\Models;

use App\Models\Genre;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class Buku extends Model
{
    protected $table = "bukus";

    protected $guarded = ['id'];

    public function scopeSearch(Builder $query,$search)
    {
        $query->when($search["search"] ?? false, function ($query, $search) {
            $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('author', 'like', '%' . $search . '%');
        });
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'genre_buku');
    }

    public function pinjam()
    {
        return $this->hasOne(Pinjam::class);
    }

    public function chapters() {
        return $this->belongsToMany(Chapter::class, 'chapter_buku');
    }

    public function ceritas() {
        return $this->belongsToMany(Cerita::class,'cerita_buku');
    }
}

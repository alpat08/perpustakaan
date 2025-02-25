<?php

namespace App\Models;

use App\Models\Genre;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = "bukus";

    public function genres() {
        return $this->belongsToMany(Genre::class);
    }

    protected $guarded = ['id'];
}

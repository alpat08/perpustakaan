<?php

namespace App\Models;

use App\Models\Buku;
use App\Models\Chapter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cerita extends Model
{
    use HasFactory;
    
    protected $table = 'ceritas';

    protected $fillable = ['isi'];

    public function chapter() {
        return $this->belongsToMany(Chapter::class,'cerita_chapter');
    }
}

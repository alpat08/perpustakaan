<?php

namespace App\Models;

use App\Models\Buku;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cerita extends Model
{
    use HasFactory;
    
    protected $table = 'ceritas';

    protected $fillable = ['isi'];

    public function bukus() {
        return $this->belongsToMany(Buku::class,'cerita_buku');
    }
}

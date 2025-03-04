<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pinjam extends Model
{
    protected $table = 'pinjams';

    protected $guarded = ['id'];

    protected $casts = [
        'tanggal_pinjam' => 'datetime',
        'tanggal_kembali' => 'datetime',
    ];

    public function isPending()
    {
        return $this->status === 'menunggu_persetujuan';
    }

    public function isApproved()
    {
        return $this->status === 'disetujui';
    }

    public function isRejected()
    {
        return $this->status === 'ditolak';
    }

    public function isBorrowed()
    {
        return $this->status === 'dipinjam';
    }

    public function isReturned()
    {
        return $this->status === 'dikembalikan';
    }

    public function isLate()
    {
        return $this->status === 'terlambat';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }
}

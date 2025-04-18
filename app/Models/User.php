<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    public function scopeSearch(Builder $query, $search)
    {
        $query->when($search['search'] ?? false, function ($query, $searchValue) {
            $query->where('name', 'like', '%' . $searchValue . '%')
                ->orWhere('email', 'like', '%' . $searchValue . '%');
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $casts = [
        'banned_until' => 'datetime'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function pinjam()
    {
        return $this->hasOne(Pinjam::class, 'user_id');
    }

    public function pinjamAktif()
    {
        return $this->hasOne(Pinjam::class)
            ->where('status', 'dipinjam')
            ->latest();
    }

    public function sedangMeminjam()
    {
        return $this->pinjam()->whereIn('status', ['menunggu_persetujuan', 'disetujui', 'dipinjam'])->exists();
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Genre;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Pastikan folder penyimpanan ada
        Storage::makeDirectory('profile-images');

        // Path target di dalam storage
        $defaultImagePath = 'profile-images/alya.jpg';

        // Cek apakah file sudah ada di storage, jika tidak, salin dari sumber
        if (!Storage::exists($defaultImagePath)) {
            Storage::put($defaultImagePath, file_get_contents(public_path('img/alya.jpg')));
        }

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            'role' => 'admin'
        ]);
        User::factory()->create([
            'name' => 'zems',
            'email' => 'zems@gmail.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            'role' => 'siswa'
        ]);
        User::factory()->create([
            'name' => 'fajar',
            'email' => 'fajar@gmail.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            'role' => 'guru'
        ]);
        User::factory()->create([
            'name' => 'alpat',
            'email' => 'alpat@gmail.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            'role' => 'guru',
            'image' => 'profile-images/alya.jpg'
        ]);

        $genres = [
            'Isekai',
            'Romance',
            'Slice Of Life',
            'Horror',
            'Action',
            'Comedy',
            'Fantasy',
            'Adventure',
            'School',
            'Yuri',
            'Gore',
            'Mystery',
            'Mecha',
            'Ecchi',
            'Harem',
            'Shounen',
            'Supernatural',
        ];

        foreach ($genres as $genre) {
            Genre::create(['name' => $genre]);
        }
    }
}

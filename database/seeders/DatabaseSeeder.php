<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Genre;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

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
        ];

        foreach($genres as $genre) {
            Genre::create(['name' => $genre]);
        }
    }
}

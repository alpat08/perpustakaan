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
            'Action', 'Adventure', 'Alchemy', 'Aliens', 'Alternative History',
            'Ancient Artifacts', 'Artificial Intelligence', 'Arranged Marriage',
            'Bioengineering', 'Body Swapping', 'Boys Love (BL)', 'Brotherhood',
            'Childhood Friends', 'Clowns', 'Comedy', 'Coming of Age',
            'Conspiracy', 'Cooking', 'Cosmic Horror', 'Crime', 'Cult', 'Cultivation',
            'Cyber Warfare', 'Cyberpunk', 'Dementia', 'Demon', 'Detective', 'Divorce',
            'Drama', 'Dystopian', 'Ecchi', 'Egyptian Mythology', 'Espers', 'Espionage',
            'Existentialism', 'Fairy Tale', 'Family', 'Fantasy', 'Fashion', 'Feudal Japan',
            'Fishing', 'Folk Tales', 'Forbidden Love', 'Friendship', 'Gambling',
            'Game', 'Gangsters', 'Giant Monsters', 'Giant Robots', 'Gladiator',
            'Gore', 'Greek Mythology', 'Haunted House', 'Harem', 'Hentai', 'Historical',
            'Horror', 'Hyper-Realistic Dreams', 'Idol', 'Isekai', 'Josei', 'Kaiju',
            'Kids', 'Law', 'Living Dolls', 'Living Weapons', 'Love Triangle', 'Mad Scientists',
            'Magic', 'Magical Girls', 'Mafia', 'Martial Arts', 'Mecha', 'Mecha Girls',
            'Mecha Warfare', 'Medieval Fantasy', 'Medical', 'Military', 'Mind Control',
            'Mafia', 'Marriage', 'Martial Arts', 'Medical', 'Mecha', 'Mecha Girls',
            'Mecha Warfare', 'Medieval Fantasy', 'Military', 'Mind Control', 'Mistery',
            'Mutants', 'Music', 'Mythical Creatures', 'Mythology', 'Native American',
            'Ninja', 'Otome Game', 'Outlaws', 'Parallel Universe', 'Parody', 'Parenting',
            'Philosophy', 'Photography', 'Pirates', 'Police', 'Post-Apocalypse',
            'Post-Human Civilization', 'Post-Apocalyptic', 'Psychic Powers',
            'Psychological', 'Puppeteers', 'Reincarnation', 'Reverse Harem',
            'Robots', 'Romance', 'Samurai', 'Samurai Era', 'School', 'Sci-Fi',
            'Secret Societies', 'Seinen', 'Sentient AI', 'Shoujo', 'Shoujo Ai',
            'Shounen', 'Shounen Ai', 'Single Parent', 'Sisterhood', 'Slice Of Life',
            'Space', 'Space Opera', 'Sports', 'Steampunk', 'Supernatural',
            'Supernatural Investigation', 'Superpower', 'Survival', 'Tattoo',
            'Teacher-Student Romance', 'Thriller', 'Time Travel', 'Tragedy',
            'Utopian', 'Vampire', 'Viking', 'Virtual Reality', 'Weather Control',
            'Western', 'Wuxia', 'Xianxia', 'Xuanhuan', 'Yaoi', 'Yuri', 'Zombies'
        ];
        
        foreach ($genres as $genre) {
            Genre::firstOrCreate(['name' => $genre]);
        }        
    }
}

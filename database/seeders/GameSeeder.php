<?php

namespace Database\Seeders;

use App\Models\GameGenre;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $games = [
            [
                'id' => Str::uuid(),
                'genre_id' => GameGenre::where('name', 'FPS')->first()->id,
                'name' => 'Counter Strike 2',
                'price_type' => 'Match',
                'game_picture_url' => 'https://firebasestorage.googleapis.com/v0/b/temanmabar-7a90d.appspot.com/o/game%2Fcs2.webp?alt=media&token=8c6bc034-1e0b-4ab7-9011-d9aab6c97375'
            ],
            [
                'id' => Str::uuid(),
                'genre_id' => GameGenre::where('name', 'MOBA')->first()->id,
                'name' => 'Honor of Kings',
                'price_type' => 'Match',
                'game_picture_url' => 'https://firebasestorage.googleapis.com/v0/b/temanmabar-7a90d.appspot.com/o/game%2Fhok.jpg?alt=media&token=0c031b4c-07ea-4401-bd3d-632c5bd14287'
            ],
            [
                'id' => Str::uuid(),
                'genre_id' => GameGenre::where('name', 'MOBA')->first()->id,
                'name' => 'Mobile Legends',
                'price_type' => 'Match',
                'game_picture_url' => 'https://firebasestorage.googleapis.com/v0/b/temanmabar-7a90d.appspot.com/o/game%2Fmole.jpeg?alt=media&token=c768eecb-e16a-4ee8-af36-8fd5995a8d56'
            ],
            [
                'id' => Str::uuid(),
                'genre_id' => GameGenre::where('name', 'FPS')->first()->id,
                'name' => 'VALORANT',
                'price_type' => 'Match',
                'game_picture_url' => 'https://firebasestorage.googleapis.com/v0/b/temanmabar-7a90d.appspot.com/o/game%2Fvalorant.jpg?alt=media&token=b0552213-048c-4bf7-9cf6-ac0f50719ce7g'
            ],
            [
                'id' => Str::uuid(),
                'genre_id' => GameGenre::where('name', 'Action')->first()->id,
                'name' => 'GTA V',
                'price_type' => 'Hour',
                'game_picture_url' => 'https://firebasestorage.googleapis.com/v0/b/temanmabar-7a90d.appspot.com/o/game%2FGTAV.jpg?alt=media&token=f37242bb-bf6a-4293-a217-7dbad374bd5f'
            ],
            [
                'id' => Str::uuid(),
                'genre_id' => GameGenre::where('name', 'Adventure')->first()->id,
                'name' => 'Minecraft',
                'price_type' => 'Hour',
                'game_picture_url' => 'https://firebasestorage.googleapis.com/v0/b/temanmabar-7a90d.appspot.com/o/game%2Fminecraft.jpg?alt=media&token=64e80095-918f-4d50-a757-babec917890b'
            ],
            [
                'id' => Str::uuid(),
                'genre_id' => GameGenre::where('name', 'Sports')->first()->id,
                'name' => 'FIFA 23',
                'price_type' => 'Match',
                'game_picture_url' => 'https://firebasestorage.googleapis.com/v0/b/temanmabar-7a90d.appspot.com/o/game%2Ffifa23.jpg?alt=media&token=c119f505-c28c-4335-b827-def4e5012c67'
            ],
            [
                'id' => Str::uuid(),
                'genre_id' => GameGenre::where('name', 'Puzzle')->first()->id,
                'name' => 'It Takes two',
                'price_type' => 'Hour',
                'game_picture_url' => 'https://firebasestorage.googleapis.com/v0/b/temanmabar-7a90d.appspot.com/o/game%2Fitt.jpg?alt=media&token=44825c15-2514-4cb9-b5db-d8809f3297fd'
            ],
            [
                'id' => Str::uuid(),
                'genre_id' => GameGenre::where('name', 'Horror')->first()->id,
                'name' => 'Dead By Daylight',
                'price_type' => 'Match',
                'game_picture_url' => 'https://firebasestorage.googleapis.com/v0/b/temanmabar-7a90d.appspot.com/o/game%2Fdbd.jpg?alt=media&token=b6a719a3-8807-4b3b-b48d-f35b10888523'
            ],
            [
                'id' => Str::uuid(),
                'genre_id' => GameGenre::where('name', 'Racing')->first()->id,
                'name' => 'Forza Horizon 5',
                'price_type' => 'Match',
                'game_picture_url' => 'https://firebasestorage.googleapis.com/v0/b/temanmabar-7a90d.appspot.com/o/game%2Fforza5.jpg?alt=media&token=8de4ee3a-3023-4ee2-9eb8-5d22bdcdacc5'
            ],
        ];

        DB::table('games')->insert($games);
    }
}

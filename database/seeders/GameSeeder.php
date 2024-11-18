<?php

namespace Database\Seeders;

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
        $genres = DB::table('game_genres')->pluck('id')->toArray();
        $games = [
            [
                'id' => Str::uuid(),
                'genre_id' => $genres[array_rand($genres)],
                'name' => 'Counter Strike 2',
                'price_type' => 'Match',
                'game_picture_url' => 'https://firebasestorage.googleapis.com/v0/b/temanmabar-7a90d.appspot.com/o/game%2Fcs2.webp?alt=media&token=8c6bc034-1e0b-4ab7-9011-d9aab6c97375'
            ],
            [
                'id' => Str::uuid(),
                'genre_id' => $genres[array_rand($genres)],
                'name' => 'Honor of Kings',
                'price_type' => 'Match',
                'game_picture_url' => 'https://firebasestorage.googleapis.com/v0/b/temanmabar-7a90d.appspot.com/o/game%2Fhok.jpg?alt=media&token=0c031b4c-07ea-4401-bd3d-632c5bd14287'
            ],
            [
                'id' => Str::uuid(),
                'genre_id' => $genres[array_rand($genres)],
                'name' => 'Mobile Legends',
                'price_type' => 'Match',
                'game_picture_url' => 'https://firebasestorage.googleapis.com/v0/b/temanmabar-7a90d.appspot.com/o/game%2Fmole.jpeg?alt=media&token=c768eecb-e16a-4ee8-af36-8fd5995a8d56'
            ],
            [
                'id' => Str::uuid(),
                'genre_id' => $genres[array_rand($genres)],
                'name' => 'VALORANT',
                'price_type' => 'Match',
                'game_picture_url' => 'https://firebasestorage.googleapis.com/v0/b/temanmabar-7a90d.appspot.com/o/game%2Fvalorant.jpg?alt=media&token=b0552213-048c-4bf7-9cf6-ac0f50719ce7g'
            ],
        ];

        DB::table('games')->insert($games);
    }
}

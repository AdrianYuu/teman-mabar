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
                'name' => 'Game Title 1',
                'price_type' => 'Match',
                'game_picture_url' => 'https://example.com/game1.jpg'
            ],
            [
                'id' => Str::uuid(),
                'genre_id' => $genres[array_rand($genres)],
                'name' => 'Game Title 2',
                'price_type' => 'Match',
                'game_picture_url' => 'https://example.com/game2.jpg'
            ],
            [
                'id' => Str::uuid(),
                'genre_id' => $genres[array_rand($genres)],
                'name' => 'Game Title 3',
                'price_type' => 'Match',
                'game_picture_url' => 'https://example.com/game3.jpg'
            ],
            [
                'id' => Str::uuid(),
                'genre_id' => $genres[array_rand($genres)],
                'name' => 'Game Title 4',
                'price_type' => 'Match',
                'game_picture_url' => 'https://example.com/game4.jpg'
            ],
        ];

        DB::table('games')->insert($games);
    }
}

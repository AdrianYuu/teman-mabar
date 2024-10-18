<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class GameGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = [
            ['id' => Str::uuid(), 'name' => 'Action'],
            ['id' => Str::uuid(), 'name' => 'Adventure'],
            ['id' => Str::uuid(), 'name' => 'Role-playing'],
            ['id' => Str::uuid(), 'name' => 'Simulation'],
            ['id' => Str::uuid(), 'name' => 'Strategy'],
            ['id' => Str::uuid(), 'name' => 'Sports'],
            ['id' => Str::uuid(), 'name' => 'Puzzle'],
            ['id' => Str::uuid(), 'name' => 'Horror'],
            ['id' => Str::uuid(), 'name' => 'Racing'],
            ['id' => Str::uuid(), 'name' => 'Shooter'],
        ];

        DB::table('game_genres')->insert($genres);
    }
}

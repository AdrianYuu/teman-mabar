<?php

namespace Database\Seeders;

use App\Models\ForumQuestion;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ForumQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all()->pluck('id');
        $faker = Faker::create('id_ID');

        for ($i=0; $i < 5; $i++) { 
            ForumQuestion::create([
                'user_id' => $users->random(),
                'title' => $faker->words(20, true),
                'question' => $faker->paragraph(20),
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $name = [
            'Bernard',
            'Bereness'
        ];

        foreach ($name as $n) {
            User::create([
                'id' => Str::uuid(),
                'name' => $n,
                'email' => $n.'@gmail.com',
                'password' => 'Oke123'
            ]);
        }
    }
}

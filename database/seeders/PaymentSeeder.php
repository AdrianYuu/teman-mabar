<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Payment::insert([
            ['id' => Str::uuid(), 'name' => 'Go-Pay'],
            ['id' => Str::uuid(), 'name' => 'OVO']
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Card;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Card::factory()->create([
            'number' => "0000000000",
            'balance' => 500,
            'user_id' => 4,
            'tariff_id' => 4 
        ]);
    }
}

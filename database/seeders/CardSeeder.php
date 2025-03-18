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
        Card::factory()->createMany([
            [
                'number' => "0000000000",
                'balance' => 500,
                'user_id' => 1,
                'city_tariff_id' => 1
            ],
            [
                'number' => "0000000001",
                'balance' => 400,
                'user_id' => 1,
                'city_tariff_id' => 5
            ]
        ]);
    }
}

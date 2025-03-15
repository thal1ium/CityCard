<?php

namespace Database\Seeders;

use App\Models\Tariffs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TariffsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tariffs::factory()->createMany([
            [
                'type' => 'Стандартний',
                'city_id' => 1,
            ],
            [
                'type' => 'Студентський/Учнівський',
                'city_id' => 1,
            ],
            [
                'type' => 'Пільговий',
                'city_id' => 1,
            ],
            [
                'type' => 'Службовий',
                'city_id' => 1,
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Tariff;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TariffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tariff::factory()->createMany([
            [
                'type' => 'Стандартний',
            ],
            [
                'type' => 'Студентський/Учнівський',
            ],
            [
                'type' => 'Пільговий',
            ],
            [
                'type' => 'Службовий',
            ],
        ]);
    }
}

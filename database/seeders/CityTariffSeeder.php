<?php

namespace Database\Seeders;

use App\Models\CityTariff;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CityTariffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CityTariff::factory()->createMany([
            [
                "price" => 20,
                "tariff_id" => 1,
                "city_id" => 1,
                "transport_id" => 1,
            ],
            [
                "price" => 15,
                "tariff_id" => 2,
                "city_id" => 1,
                "transport_id" => 1,
            ],
            [
                "price" => 10,
                "tariff_id" => 3,
                "city_id" => 1,
                "transport_id" => 1,
            ],
            [
                "price" => 0,
                "tariff_id" => 4,
                "city_id" => 1,
                "transport_id" => 1,
            ],
            [
                "price" => 17,
                "tariff_id" => 1,
                "city_id" => 1,
                "transport_id" => 2,
            ],
            [
                "price" => 14,
                "tariff_id" => 2,
                "city_id" => 1,
                "transport_id" => 2,
            ],
            [
                "price" => 10,
                "tariff_id" => 3,
                "city_id" => 1,
                "transport_id" => 2,
            ],
            [
                "price" => 0,
                "tariff_id" => 4,
                "city_id" => 1,
                "transport_id" => 2,
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\CardHistory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CardHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CardHistory::factory(20)->create();
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CardHistory>
 */
class CardHistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $transaction_type = ['Поповнення', 'Списання'];
        $random_key = array_rand($transaction_type);

        return [
            'amount' => $this->faker->numberBetween(10, 100),
            'transaction_type' => $transaction_type[$random_key],
            'time' => $this->faker->dateTime(),
            'card_id' => 1
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Diesel;
use Illuminate\Database\Eloquent\Factories\Factory;

class DieselFactory extends Factory
{
    protected $model = Diesel::class;

    public function definition()
    {
        return [
            'supplier_id' => $this->faker->numberBetween(1, 10), // Adjust the range as needed
            'voucher' => $this->faker->word,
            'type' => $this->faker->randomElement(['Type A', 'Type B', 'Type C']),
            'invoice_num' => $this->faker->unique()->numberBetween(1000, 9999),
            'quantity' => $this->faker->randomFloat(2, 100, 1000),
            'date' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
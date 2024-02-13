<?php

namespace Database\Factories;

use App\Models\InvoiceItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description' => $this->faker->sentence,
            'quantity' => $this->faker->numberBetween(1, 10),
            'amount' => $this->faker->randomFloat(2, 10, 100),
        ];
    }
}

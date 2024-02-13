<?php

namespace Database\Factories;

use App\Models\Invoice;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{
    protected $model = Invoice::class;

    public function definition()
    {
        return [
            'description' => $this->faker->sentence,
            'address' => $this->faker->address,
            'payment_status' => $this->faker->randomElement(['paid', 'pending', 'unpaid']),
            'payment_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}

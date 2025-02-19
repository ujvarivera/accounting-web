<?php

namespace Database\Factories;

use App\Models\Invoice;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    protected $model = Invoice::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'no' => (string) fake()->randomNumber(7, true),
            'from'=> fake()->company(),
            'to'=> fake()->company(),
            'date'=> fake()->date(),
            'due_date'=> fake()->date(),
            'total'=> fake()->randomFloat(2, 100, 999), 
        ];
    }
}

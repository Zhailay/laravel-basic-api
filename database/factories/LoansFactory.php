<?php

namespace Database\Factories;

use App\Models\Loans;
use Illuminate\Database\Eloquent\Factories\Factory;

class LoansFactory extends Factory
{
    protected $model = Loans::class;

    public function definition()
    {
        return [
            'amount' => $this->faker->randomNumber(5),
            'duration' => $this->faker->numberBetween(6, 36),
            'inter_rate' => $this->faker->numberBetween(10,18),
        ];
    }
}

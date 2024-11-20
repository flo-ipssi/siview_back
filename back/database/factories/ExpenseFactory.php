<?php

namespace Database\Factories;

use App\Enums\ExpenseCategoryEnum;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Validation\Rules\Enum;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Expense>
 */
class ExpenseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        return [
            'user_id' => $this->faker->randomElement(User::all()->pluck('id')->toArray()),
            'category' => $this->faker->randomElement(ExpenseCategoryEnum::values()),
            'amount' => $this->faker->randomFloat(2, 1, 1000),
            'date' => $this->faker->date(),
            'description' => $this->faker->sentence(),
        ];
    }
}

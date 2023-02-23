<?php

namespace Database\Factories;

use App\Models\Advertisement;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random(),
            'advertisement_id' => Advertisement::all()->random(),
            'rating' => $this->faker->randomFloat(2, 0, 5),
            'description' => $this->faker->text
        ];
    }
}

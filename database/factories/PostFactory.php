<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'=> $this->faker->jobTitle(),
            'hiring' => $this->faker->randomDigit(),
            'salary' => $this->faker->randomNumber(4),
            'description' => $this->faker->paragraph(2),
            'requirment' => $this->faker->paragraph(2),
        ];
    }
}

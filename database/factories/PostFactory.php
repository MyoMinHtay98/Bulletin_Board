<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'post_title' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'is_public' => $this->faker->boolean(80),
            'message' => $this->faker->realText($maxNbChars = 50, $indexSize = 2),
            'description' => $this->faker->realText($maxNbChars = 50, $indexSize = 2),
        ];
    }
}

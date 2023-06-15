<?php

namespace Database\Factories;

use App\Models\Likes;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Likes>
 */
class LikesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {


        return [
            //
            'user_id' => fake()->numberBetween(1, 10),
            'post_id' => fake()->numberBetween(1, 12),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Likes $like) {
            $like->post()->increment('likes');
        });
    }

}

<?php

namespace Database\Factories;

use App\Models\Comments;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comments>
 */
class CommentsFactory extends Factory
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
            'post_id' => fake()->numberBetween(1, 10),
            'content' => fake()->sentence()
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Comments $comment) {
            $comment->post()->increment('comments');
        });
    }

}

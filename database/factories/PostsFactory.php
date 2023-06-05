<?php

namespace Database\Factories;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $imagePath = public_path('images');
        $images = glob($imagePath . '/*.{jpg,png,gif}', GLOB_BRACE);

        return [
            'user_id' => $this->faker->numberBetween(1, 5),
            'post-content' => $this->faker->sentence,
            'post-img' => $images ? str_replace($imagePath . '/', '', $this->faker->randomElement($images)) : null,
        ];
    }
    
}

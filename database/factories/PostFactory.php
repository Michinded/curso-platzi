<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
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
    public function definition(): array
    {
        return [
            // user_id disponible en la tabla users (variable id)
            'user_id' => $this->faker->numberBetween(1, 10),
            // title
            'title' => $title = $this->faker->sentence(),
            // slug
            'slug' => Str::slug($title),
            // body
            'body' => $this->faker->sentence(2000),
        ];
    }
}

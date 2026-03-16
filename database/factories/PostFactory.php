<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
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
    public function definition(): array
    {
        $title = fake()->sentence(rand(6,8));
        return [
            'title' => $title,
            'slug' => str()->slug($title),
            'category_id' => Category::factory(),
            'author_id' => User::factory(),
            'body' => fake()->paragraphs(3, true),
        ];
    }
}

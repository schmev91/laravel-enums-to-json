<?php

namespace SassLaravel\LaravelEnumsToJson\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use SassLaravel\LaravelEnumsToJson\Models\Post;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        return [
            "title" => fake()->paragraph(),
            "content" => fake()->paragraphs(),
            "user_id" => 1,
        ];
    }
}

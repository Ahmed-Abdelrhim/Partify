<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{

    public function definition(): array
    {
        $status = rand(0, 1) == true ? Article::STATUS_PUBLISHED : Article::STATUS_PENDING;
        if ($status === Article::STATUS_PUBLISHED) {
            $published_at = fake()->dateTimeBetween('-10 month', '+1 month')->format('Y-m-d H:i:s');
        }

        return [
            'title' => fake()->sentence(5),
            'teaser' => fake()->sentence(20),
            'status' => $status,
            'published_at' => isset($published_at) ? $published_at : null,
        ];
    }
}

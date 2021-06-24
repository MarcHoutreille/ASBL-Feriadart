<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(3);
        $slug = str_replace(' ','-',strtolower($title));
        $slug = str_replace('.','',$slug);
        $body = $this->faker->paragraph(6, true);
        return [
            'title' => $title,
            'slug' => $slug,
            'img_src' => $this->faker->imageUrl($width = 720, $height = 400, 'Event'),
            'body' => $body,
            "excerpt" => substr($body,0,50) . '...',
        ];
    }
}

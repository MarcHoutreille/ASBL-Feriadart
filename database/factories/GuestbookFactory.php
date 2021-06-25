<?php

namespace Database\Factories;

use App\Models\Guestbook;
use Illuminate\Database\Eloquent\Factories\Factory;

class GuestbookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Guestbook::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'title' => $this->faker->jobTitle(),
            'email' => $this->faker->email(),
            'message' => $this->faker->paragraph(6, true),
        ];
    }
}

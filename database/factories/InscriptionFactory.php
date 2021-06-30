<?php

namespace Database\Factories;

use App\Models\Inscription;
use Illuminate\Database\Eloquent\Factories\Factory;

class InscriptionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Inscription::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fname' => $this->faker->firstName(),
            'lname' => $this->faker->lastName(),
            'bio' => $this->faker->paragraph(1, true),
            'products' => $this->faker->paragraph(6, true),
            'telephone' => $this->faker->e164PhoneNumber(),
            'email' => $this->faker->companyEmail(),
            'url' => $this->faker->url(),
            'img_src' => $this->faker->imageUrl($width = 720, $height = 400, 'Artist'),
        ];
    }
}

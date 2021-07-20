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
            'facebook' => $this->faker->url(),
            'instagram' => $this->faker->url(),
            'img_01' => 'https://source.unsplash.com/720x400/?art',
            'img_02' => 'https://source.unsplash.com/720x400/?art',
            'img_03' => 'https://source.unsplash.com/720x400/?art',
            'img_04' => 'https://source.unsplash.com/720x400/?art',
            'img_05' => 'https://source.unsplash.com/720x400/?art',
            'accepted' => 0,
        ];
    }
}

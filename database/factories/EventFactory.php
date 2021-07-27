<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->sentence(3);
        $slug = str_replace(' ', '-', strtolower($name));
        $slug = str_replace('.', '', $slug);
        $startDate = $this->faker->dateTimeThisYear();
        $interval = '+ 1 days';
        $endDate = $this->faker->dateTimeInInterval($startDate, $interval);

        return [
            'date_start' => $startDate,
            'date_end' => $endDate,
            'name' => $name,
            'slug' => $slug,
            'img_src' => 'https://source.unsplash.com/720x400/?craft,art',
            'description' => $this->faker->paragraph(6, true),
            'inscription_img' => 'https://source.unsplash.com/720x400/?craft,art',
            'inscription_txt' => $this->faker->paragraph(3, true),
            'place' => $this->faker->city(),
            'address' => $this->faker->address(),
            'telephone' => $this->faker->e164PhoneNumber(),
            'email' => $this->faker->companyEmail(),
            'url' => $this->faker->url(),
        ];
    }
}

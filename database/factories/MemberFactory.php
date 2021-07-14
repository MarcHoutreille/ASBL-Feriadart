<?php

namespace Database\Factories;

use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;

class MemberFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Member::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->name();
        $replace = array(' ', '.');
        $username = substr(str_replace($replace,'',strtolower($name)),0).rand(1,999);
        $facebook = 'https://www.facebook.com/'.$username;
        $instagram = 'https://www.instagram.com/'.$username;
        return [
            'name' => $name,
            'title' => $this->faker->jobTitle(),
            'bio' => $this->faker->paragraph(1, true),
            'email' => $username.'@mail.com',
            'facebook' => $facebook,
            'instagram' => $instagram,
        ];
    }
}

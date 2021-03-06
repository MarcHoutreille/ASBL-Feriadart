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
        $fname = $this->faker->firstName();
        $lname = $this->faker->lastName();
        $replace = array(' ', '.');
        $username = substr(str_replace($replace, '', strtolower($fname)), 0) . rand(1, 999);
        $facebook = 'https://www.facebook.com/' . $username;
        $instagram = 'https://www.instagram.com/' . $username;
        return [
            'fname' => $fname,
            'lname' => $lname,
            'title' => $this->faker->jobTitle(),
            'bio' => $this->faker->paragraph(1, true),
            'img_src' => 'https://i.pravatar.cc/200?u=' . $username,
            'url' => $this->faker->url(),
            'email' => $username . '@mail.com',
            'facebook' => $facebook,
            'instagram' => $instagram,
        ];
    }
}

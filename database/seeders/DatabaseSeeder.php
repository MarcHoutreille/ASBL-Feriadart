<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Event;
use App\Models\Article;
use App\Models\Contact;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Create default admin user
        $admin = User::create([
            'name'=> 'Admin',
            'username'=> 'admin',
            'email' => 'admin@email.com',
            'password' => Hash::make('password')
        ]);
        
        //Create 10 random users
        //User::factory(10)->create();

        //Create 10 random articles
        Article::factory(10)->create([
            "user_id" => $admin->id,
        ]);

        //Create 10 random events
        Event::factory(10)->create([
            "user_id" => $admin->id,
        ]);

        //Create 10 random contact messages
        Contact::factory(10)->create();
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Event;
use App\Models\Article;
use App\Models\Contact;
use App\Models\Guest;
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

        //Create REAL ARTICLE
        Article::create([
            'user_id' => $admin->id,
            'title' => 'Communiqué de presse',
            'slug' => 'communique-de-presse',
            'img_src' => 'https://scontent.fcrl1-1.fna.fbcdn.net/v/t1.6435-9/118883528_686926448584494_9201219069583170298_n.jpg?_nc_cat=108&ccb=1-3&_nc_sid=973b4a&_nc_ohc=lC_dBy1ucIMAX8NWxQP&_nc_ht=scontent.fcrl1-1.fna&oh=8ff59af2b4ffe91c93c8fc04d6b3d508&oe=60DE5C7B',
            'body' => 
                '<h2 class="sm:text-3xl text-2xl title-font font-medium text-gray-900 mt-4 mb-4">La Feria d’Art organise sa première édition !</h2>
                <p class="leading-relaxed mb-8"><strong>La Feria d’Art entend casser les codes du marché de l’art classique, et ce, en
                désacralisant l’achat d’une oeuvre d’art tout en offrant une expérience inclusive et
                festive pour les artistes et le public lors d’un marché alternatif.</strong></p>
                <p class="leading-relaxed mb-8">Nous vous annonçons avec enthousiasme que la première édition prendra place vendredi
                18 et samedi 19 septembre 2020 dans la plus grande occupation temporaire de Belgique, à
                Bruxelles, le <strong>See U</strong>.</p>
                <p class="leading-relaxed mb-8">L’une des cinq organisatrices, de retour de quelques
                semaines passées au coeur du milieu artistique chilien,
                nous a parlé de petits marchés d’art organisés dans
                différentes villes du pays. Elle nous a raconté
                l’engagement (politique, social, etc.) de ces artistes, de
                leur communauté et des techniques qu’ils emploient
                afin de rendre leur art accessible à tout public tout en
                se rémunérant dignement par la vente de celui-ci.</p>
                <p class="leading-relaxed mb-8">C’est lors d’une soirée passée ensemble à Bruxelles en
                temps de Covid que l’envie presque évidente nous est
                venue de tenter le coup ici. Certaines d’entre nous sont
                directement concernées par la difficulté de vendre de
                l’art lorsque celui-ci ne correspond pas forcément à
                l’idée que l’on se fait de l’Artiste et nous le sommes à
                l’unanimité lorsqu’il s’agit de se confronter aux prix
                d’achat de l’Art. C’est pourquoi, loin de vouloir
                dévaloriser le travail de l’artiste, nous ouvrons une
                nouvelle porte pour le dévoiler.</p>',
            'excerpt' => 'La Feria d’Art organise sa première édition !',
            'author' => 'Nina Closson',
            'contact' => 'feriadart@gmail.com - +32494999246',
            'url' => 'https://www.facebook.com/FeriadArt/',
        ]);

        //Create 10 random articles
        Article::factory(10)->create([
            'user_id' => $admin->id,
        ]);

        //Create 10 random events
        Event::factory(10)->create([
            'user_id' => $admin->id,
        ]);

        //Create 10 random contact messages
        Contact::factory(10)->create();

        //Create 10 random guest comments
        Guest::factory(10)->create();
    }
}

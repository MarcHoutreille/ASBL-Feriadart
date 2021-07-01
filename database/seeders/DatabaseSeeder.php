<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Event;
use App\Models\Guest;
use App\Models\Article;
use App\Models\Contact;
use App\Models\Inscription;
use App\Models\File;

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
            'user_id' => $admin->id,
        ]);

        //Create REAL article
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
        
        //Create 10 random events
        Event::factory(10)->create([
            'user_id' => $admin->id,
        ]);

        //Create REAL event
        Event::create([
            'user_id' => $admin->id,
            'date_start' => '2021-09-18 16:00:00',
            'date_end' => '2021-09-19 20:00:00',
            'name' => "FERIA D'ART #1 Marché pluridisciplinaire & alternatif",
            'slug' => 'feria-d-art-01',
            'img_src' => 'https://scontent.fcrl1-1.fna.fbcdn.net/v/t1.6435-9/118883528_686926448584494_9201219069583170298_n.jpg?_nc_cat=108&ccb=1-3&_nc_sid=973b4a&_nc_ohc=lC_dBy1ucIMAX8NWxQP&_nc_ht=scontent.fcrl1-1.fna&oh=8ff59af2b4ffe91c93c8fc04d6b3d508&oe=60DE5C7B',
            'description' => 
                "<h3 class='leading-relaxed mb-4'>✨Vous souhaitez découvrir et rencontrer des artistes locaux ? Acquérir une œuvre originale à un prix abordable ? ✨</h2>
                <p class='leading-relaxed mb-4'><strong>Le See U, plus grande occupation temporaire de Belgique, au cœur des anciennes casernes d’Ixelles, ouvre ses portes à la première édition de la Feria d'Art le 18 et 19 septembre ! 🎉</strong></p>
                <p class='leading-relaxed mb-4'>☀️ La Feria est un marché d’art alternatif et pluridisciplinaire qui vise à proposer une diversité de productions à petits prix, à donner de la visibilité à des artistes professionnel.les ou amateur.es et à vous permettre d’accéder à des œuvres originales hors des galeries traditionnelles. ☀️</p>
                <ul class='mb-4'>
                    <li>👉 Peinture</li>
                    <li>👉 Dessin</li>
                    <li>👉 Photographie</li>
                    <li>👉 Prints</li>
                    <li>👉 Edition </li>
                    <li>👉 Céramique</li>
                    <li>👉 Linogravure</li>
                    <li>👉 Sérigraphie</li>
                    <li>👉 Graffiti</li>
                    <li>👉 Textile</li>
                    <li>👉 Collage</li>
                    <li>ETC...</li>
                </ul>
                <h3 class='leading-relaxed mb-4'>💥INFOS PRATIQUES 💥</h3>
                <p class='leading-relaxed mb-4'><strong>Entrée GRATUITE</strong></p>
                <p class='leading-relaxed mb-4'>📍 OU ? SEE U, Avenue de la couronne 227, bâtiment M, Ixelles</p>
                <p class='leading-relaxed mb-4'>📆 QUAND ? Vendredi 18 septembre de 16h à 22h + Samedi 19 septembre de 12h à 20h</p>
                <p class='leading-relaxed mb-4'>💵 COMBIEN ? Le prix de vente de chaque œuvre est limité à 50 euros maximum</p>
                <p class='leading-relaxed mb-4'>🍔 Food truck & Guinguette 🍺</p>
                <p class='leading-relaxed mb-4'>💸 Prévoyez du CASH💸</p>
                <ul>
                    <li>⚠️ Mesures Covid ⚠️</li>
                    <li>- Masque obligatoire</li>
                    <li>- Gel hydroalcoolique à disposition</li>
                    <li>- Parcours de circulation Covid safe</li>
                </ul>",
            'place' => 'See U',
            'address' => 'Rue Fritz Toussaint 8, 1050, Ixelles, Bruxelles',
            'telephone' => '+32494999246',
            'email' => 'feriadart@gmail.com',
            'url' => 'https://www.facebook.com/events/695373977721327/',           
        ]);

        //Create 10 random contact messages
        Contact::factory(10)->create();

        //Create 10 random guest comments
        Guest::factory(10)->create();

        //Create 1 random accepted guest comment
        Guest::factory(1)->create([
            'accepted' => 1,
        ]);

        //Create 10 random inscriptions to event #11
        Inscription::factory(10)->create([
            'event_id' => 11,
        ]);
        File::factory(5)->create([
            'event_id' => 1,
        ]);
        File::create([
            'event_id' => 11,
            'type' => "image",
            'img_src' => "http://127.0.0.1:8000/images/Feriadart0.png",
          
        ]);
        File::create([
            'event_id' => 11,
            'type' => "image",
            'img_src' => "http://127.0.0.1:8000/images/Feriadart1.png",
        ]);
        File::create([
            'event_id' => 11,
            'type' => "image",
            'img_src' => "http://127.0.0.1:8000/images/Feriadart2.png",
        ]);
        File::create([
            'event_id' => 11,
            'type' => "image",
            'img_src' => "http://127.0.0.1:8000/images/Feriadart3.png",
        ]);
        File::create([
            'event_id' => 11,
            'type' => "image",
            'img_src' => "http://127.0.0.1:8000/images/Feriadart4.png",
        ]);
        File::create([
            'event_id' => 11,
            'type' => "image",
            'img_src' => "http://127.0.0.1:8000/images/Feriadart5.png",
        ]);
    }
}

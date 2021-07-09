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
        //Create real admin user
        $admin = User::create([
            'name'=> 'Admin',
            'username'=> 'admin',
            'email' => 'admin@email.com',
            'password' => Hash::make('password')
        ]);
        
        //Create 10 random users
        //User::factory(10)->create();

        //Create 5 random articles
        Article::factory(5)->create([
            'user_id' => $admin->id,
        ]);

        //Create real article
        Article::create([
            'user_id' => $admin->id,
            'title' => 'Communiqué de presse',
            'slug' => 'communique-de-presse',
            'img_src' => '/images/Feria_event1.png',
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
        
        //Create 5 random events
        Event::factory(5)->create([
            'user_id' => $admin->id,
        ]);

        //Create real event
        Event::create([
            'user_id' => $admin->id,
            'date_start' => '2021-09-18 16:00:00',
            'date_end' => '2021-09-19 20:00:00',
            'name' => "FERIA D'ART #1 Marché pluridisciplinaire & alternatif",
            'slug' => 'feria-d-art-01',
            'img_src' => '/images/Feria_event1.png',
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

        //Create 3 random accepted guest comment
        Guest::factory(3)->create([
            'accepted' => 1,
        ]);

        //Create 6 random inscriptions/artists to each random event
        Inscription::factory(6)->create([
            'event_id' => 1,
        ]);

        //Create 6 random inscriptions/artists to each random event
        Inscription::factory(6)->create([
            'event_id' => 2,
        ]);

        //Create 6 random inscriptions/artists to each random event
        Inscription::factory(6)->create([
            'event_id' => 3,
        ]);

        //Create 6 random inscriptions/artists to each random event
        Inscription::factory(6)->create([
            'event_id' => 4,
        ]);

        //Create 6 random inscriptions/artists to each random event
        Inscription::factory(6)->create([
            'event_id' => 5,
        ]);

        //Create 6 real inscriptions/artists to real event #6
        Inscription::create([
            'event_id' => 6,
            'fname' => 'Jack',
            'lname' => 'at Night',
            'bio' => 
                '<p><strong>Chloé/Jack</strong></p>
                <p>Artiste</p>
                <br/>
                <ul>
                    <li>✴ Dessin, peinture, gravure, ... à BXL</li>
                    <li>✴ Passion tatouage sous-jacente</li>
                    <li>✴ Etudiante en langues et littératures germaniques (English and Nederlands)</li>
                </ul>',
            'products' => 'Gravures 15€, Planches à pain 30€.',
            'telephone' => '01234567890',
            'email' => 'chloe.est.jacobs@gmail.com',
            'url' => 'https://jackatnight.bigcartel.com/',
            'img_src' => 'https://scontent.fcrl1-1.fna.fbcdn.net/v/t1.6435-9/119651730_692966941313778_786645997237446984_n.jpg?_nc_cat=108&ccb=1-3&_nc_sid=973b4a&_nc_ohc=k53MzXUEt8YAX-BHDoE&_nc_ht=scontent.fcrl1-1.fna&oh=1491b7e345cc9fc5bbec90607653fa8f&oe=60E2AC0B',
        ]);

        //Create 6 real inscriptions/artists to real event #6
        Inscription::create([
            'event_id' => 6,
            'fname' => 'Elodie',
            'lname' => 'DK',
            'bio' => 
                '<p><strong>Lodk</strong></p>
                <p>Print artist 🎨</p>
                <ul>
                    <li>Tea and book lover 📚</li>
                    <li>Foodie 🍜</li>
                    <li>Plantmum 🌱</li>
                </ul>',
            'products' => 'Linocut Pack 18€, Silkscreens 20€, Prints 30€',
            'telephone' => '0123456789',
            'email' => 'elodk@gmail.com',
            'url' => 'www.etsy.com/fr/shop/LodkPrints',
            'img_src' => 'https://scontent.fcrl1-1.fna.fbcdn.net/v/t1.6435-9/119730481_692966921313780_963821317840609107_n.png?_nc_cat=111&ccb=1-3&_nc_sid=973b4a&_nc_ohc=bAYg7r8DKY0AX-DEzXr&_nc_ht=scontent.fcrl1-1.fna&oh=f8c8d0e9379c9546bb6649ede462c8d9&oe=60E213C0',
        ]);

        //Create 6 real inscriptions/artists to real event #6
        Inscription::create([
            'event_id' => 6,
            'fname' => 'Pacôme',
            'lname' => 'Le Rouge',
            'bio' => 
                '<p><strong>Pacôme Le Rouge</strong></p>
                <p>Virtual Designer</p>
                <p>High immersion into emotional worlds</p>
                <p>Part of @globalurlnation</p>',
            'products' => 'Prints 30€',
            'telephone' => '0123456789',
            'email' => 'pacomelerouge@gmail.com',
            'url' => 'https://pacome.xyz/',
            'img_src' => 'https://scontent.fcrl1-1.fna.fbcdn.net/v/t1.6435-9/119690898_692966991313773_1780476648645044294_n.jpg?_nc_cat=105&ccb=1-3&_nc_sid=973b4a&_nc_ohc=6SpUgGLUWS4AX9SX93j&_nc_ht=scontent.fcrl1-1.fna&oh=347bc6057fd59be52064fe09cd289350&oe=60E22E25',
        ]);

        //Create 6 real inscriptions/artists to real event #6
        Inscription::create([
            'event_id' => 6,
            'fname' => 'Camille',
            'lname' => 'Toussaint',
            'bio' => 
            '<p><strong>Camille Toussaint</strong></p>
            <p>Illustratrice et membre de l’atelier @tonpiquant 🎨</p>
            <p>Team @emoustille.lanewsletter 🔥</p>',
            'products' => 'Linogravures 40€, Affiches 20€',
            'telephone' => '0123456789',
            'email' => 'saraheskenazi@mail.com',
            'url' => 'www.camilletoussaint.com',
            'img_src' => 'https://scontent.fcrl1-1.fna.fbcdn.net/v/t1.6435-9/119676227_692967027980436_678181737992036831_n.png?_nc_cat=105&ccb=1-3&_nc_sid=973b4a&_nc_ohc=kHD1MROVAesAX-0S-9B&_nc_ht=scontent.fcrl1-1.fna&oh=7cfe82943d2366a5742bcfa385c16bb0&oe=60E29E47',
        ]);

        //Create 6 real inscriptions/artists to real event #6
        Inscription::create([
            'event_id' => 6,
            'fname' => 'Benjamin',
            'lname' => 'Marc',
            'bio' => 
                '<p><strong>Benjamin Marc</strong></p>
                <p>Architect / Photographer / Runner / Rider</p>',
            'products' => 'Photos 20€',
            'telephone' => '0123456789',
            'email' => 'benjaminmarc@mail.com',
            'url' => 'https://benjaminm89.wixsite.com/photography',
            'img_src' => 'https://scontent.fcrl1-1.fna.fbcdn.net/v/t1.6435-9/119699817_692966964647109_691078133558361336_n.png?_nc_cat=100&ccb=1-3&_nc_sid=973b4a&_nc_ohc=TaJdfNYzpMcAX8WpyYO&_nc_ht=scontent.fcrl1-1.fna&oh=b802591720b8f6037bac5e51eb94b170&oe=60E266CB',
        ]);

        //Create 6 real inscriptions/artists to real event #6
        Inscription::create([
            'event_id' => 6,
            'fname' => 'Coline',
            'lname' => 'Cornélis',
            'bio' => 
            '<p>𝒊𝒍𝒍𝒖𝒔𝒕𝒓𝒂𝒕𝒊𝒐𝒏</p>
            <p>𝒅𝒋𝒊𝒏𝒈</p>
            <p> @passaporta</p>𝒑𝒓𝒐𝒅𝒖𝒄𝒕𝒊𝒐𝒏',
            'products' => 'Prints 15€',
            'telephone' => '0123456789',
            'email' => 'coline.cornelis@hotmail.com',
            'url' => 'https://www.instagram.com/cocornel',
            'img_src' => 'https://scontent.fcrl1-1.fna.fbcdn.net/v/t1.6435-9/119741915_692966977980441_7765633406142550922_n.png?_nc_cat=100&ccb=1-3&_nc_sid=973b4a&_nc_ohc=PitGWIWI7vIAX_7upXj&_nc_ht=scontent.fcrl1-1.fna&oh=ec6087274f1e8248fc400be6a28172ac&oe=60E31E65',
        ]);

        //Create 5 random pictures to random event #1
        File::factory(5)->create([
            'event_id' => 1,
        ]);

        //Create 5 random pictures to random event #2
        File::factory(5)->create([
            'event_id' => 2,
        ]);

        //Create 5 random pictures to random event #3
        File::factory(5)->create([
            'event_id' => 3,
        ]);

        //Create 5 random pictures to random event #4
        File::factory(5)->create([
            'event_id' => 4,
        ]);

        //Create 5 random pictures to random event #5
        File::factory(5)->create([
            'event_id' => 5,
        ]);
        
        //Create real picture to real event #6
        File::create([
            'event_id' => 6,
            'type' => "image",
            'img_src' => "/images/Feriadart0.png",
          
        ]);

        //Create real picture to real event #6
        File::create([
            'event_id' => 6,
            'type' => "image",
            'img_src' => "/images/Feriadart1.png",
        ]);

        //Create real picture to real event #6
        File::create([
            'event_id' => 6,
            'type' => "image",
            'img_src' => "/images/Feriadart2.png",
        ]);

        //Create real picture to real event #6
        File::create([
            'event_id' => 6,
            'type' => "image",
            'img_src' => "/images/Feriadart3.png",
        ]);

        //Create real picture to real event #6
        File::create([
            'event_id' => 6,
            'type' => "image",
            'img_src' => "/images/Feriadart4.png",
        ]);

        //Create real picture to real event #6
        File::create([
            'event_id' => 6,
            'type' => "image",
            'img_src' => "/images/Feriadart5.png",
        ]);
    }
}

#  FERIA D'ART 


<img src="readme/FeriaLogoGeel.png" width="120" height="120">

[See the actual site!](http://feriadart.art/)



Group project for the website of a non-profit art promotion association located in Brussels


## HOME page

The home page is constructed out of 4 main components:

1. The artist-component gives a picture (work of an artist) plus info about a random artist who is/was subscribed to an event (everytime you reload the page another artist will appear). 
You can click the button 'view more' then you will be directed to the artistspage where you can get more info and see more pictures.


<br>


![Wireframe 1](readme/Artist-component.png)
<br>
<br>


2. The second section gives info about the upcoming event with a picture of the poster of the event. If you click the button 'Learn More' you can get more info about that event.
When the event is open to subsription you can subscribe, meaning creating an artistpage, give more info about yourself and upload up to 5 pictures for your personal artistpage.
On the eventpage there is also a button 'view artist' where you can have a look at all the artist who are already subscribed to that particular event. 


<br>


![Wirefram 2](readme/event-component.png)
<br>
<br>


3. The 'Next Events'-section links to event coming up in the future, with also the possibility to see the artists subsribed to that event.

<br>

![Wirefram 2](readme/nextevent-component.png)
<br>
<br>


4. The last section shows collection of links to published articles.

<br>

![Wirefram 2](readme/articles-component.png)

<br>
<br>

Interesting fact! In the header there is a button that you can click to change the language of the site!

<br>

![Wirefram 2](readme/languagebutton.png)

<br>
<br>


## ABOUT page

On the about page you cannot only find more text about the organization, you can also see the people currently working for the organization.
They each have a card with link to there personal facebook, website, instagram account or mail-address.

<br>


## EVENTS page

Link to all the events. See above for more information about the buttons and functionalities.

<br>

## GALLERY page

On the gallery-page you will find all the events. If you select a particual event you can have a look at all the pictures from that event.

<br>


## GUESTBOOK page

<br>
The guestbook-page shows all the comments left by people visiting the site. You can leave your personal comment on the wall. Once accepted it will appear as well.

<br>

### CONTACT page

<br>
This pages gives you the possibility to interact with the organization. Its a simple contact form that you will need to fill in to get in contact wit Feria d'Art.

<br>

## FOOTER

The footer links to all the pages of the website, and also to the facebook and instagram page. Undeneath you will find the copyrights of the organization plus extra legal info.
In the footer there is a secret link incorporated to have acces to the backoffice of the site.
<br>

![Wirefram 2](readme/footer.png)

<br>
<br>


### Laravel section

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## How to install in your computer through Linux Terminal
1. clone the repo to your computer
2. $ cd ASBL-Feriadart
3. $ composer install
4. $ npm install
5. $ cp .env.example .env
6. $ php artisan key:generate
7. $ php artisan serve


## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

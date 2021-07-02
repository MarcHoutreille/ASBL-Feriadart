<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\ArtistsController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GuestbookController;

use App\Http\Controllers\BackofficeController;
use App\Http\Controllers\BackofficeFilesController;
use App\Http\Controllers\BackofficeGuestController;
use App\Http\Controllers\BackofficeEventsController;
use App\Http\Controllers\BackofficeInscriptionsController;
use App\Http\Controllers\BackofficeContactController;
use App\Http\Controllers\BackofficeArticlesController;
use App\Http\Controllers\BackofficeArtistsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/articles', [ArticlesController::class, 'index'])->name('articles');
Route::get('/articles/{article:slug}', [ArticlesController::class, 'show'])->name('article.show');
Route::get('/events', [EventsController::class, 'index'])->name('events');
Route::get('/events/{event:slug}', [EventsController::class, 'show'])->name('event.show');


Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('/gallery/{event:slug}', [GalleryController::class, 'show'])->name('gallery.show');


Route::get('/artists/event/{event:slug}', [ArtistsController::class, 'index'])->name('artists');
Route::get('/artists/artist/{artist}', [ArtistsController::class, 'show'])->name('artist.show');
Route::post('/artists/inscription/{event:slug}', [ArtistsController::class, 'inscription'])->name('artists.inscription');

Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/guestbook', [GuestbookController::class, 'index'])->name('guestbook');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/backoffice', [BackofficeController::class, 'index'])->middleware(['auth', 'verified'])->name('backoffice.index');

Route::resource('/backoffice/articles', BackofficeArticlesController::class);
Route::resource('/backoffice/events', BackofficeEventsController::class);
Route::resource('/backoffice/inscriptions', BackofficeInscriptionsController::class);
Route::resource('/backoffice/files', BackofficeFilesController::class);
Route::resource('/backoffice/artists', BackofficeArtistsController::class);
Route::resource('/backoffice/guest', BackofficeGuestController::class);
Route::resource('/backoffice/contact', BackofficeContactController::class);

require __DIR__.'/auth.php';

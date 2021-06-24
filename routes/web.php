<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GuestbookController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BackofficeController;

use App\Http\Controllers\BackofficeArticlesController;
use App\Http\Controllers\BackofficeEventsController;
use App\Http\Controllers\BackofficeEventsInscriptionsController;
use App\Http\Controllers\BackofficeArtistsPicturesController;
use App\Http\Controllers\BackofficeArtistsVideosController;
use App\Http\Controllers\BackofficeEventsPicturesController;
use App\Http\Controllers\BackofficeEventsVideosController;
use App\Http\Controllers\BackofficeGuestbookController;
use App\Http\Controllers\BackofficeContactController;

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
Route::get('/events', [EventsController::class, 'index'])->name('events');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/guestbook', [GuestbookController::class, 'index'])->name('guestbook');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/backoffice', [BackofficeController::class, 'index'])->middleware(['auth', 'verified'])->name('backoffice.index');

Route::resource('/backoffice/articles', BackofficeArticlesController::class);
Route::resource('/backoffice/events', BackofficeEventsController::class);
Route::resource('/backoffice/eventsInscriptions', BackofficeEventsInscriptionsController::class);
Route::resource('/backoffice/eventsPictures', BackofficeEventsPicturesController::class);
Route::resource('/backoffice/eventsVideos', BackofficeEventsVideosController::class);
Route::resource('/backoffice/artistsPictures', BackofficeArtistsPicturesController::class);
Route::resource('/backoffice/artistsVideos', BackofficeArtistsVideosController::class);
Route::resource('/backoffice/guestbook', BackofficeGuestbookController::class);
Route::resource('/backoffice/contact', BackofficeContactController::class);

require __DIR__.'/auth.php';

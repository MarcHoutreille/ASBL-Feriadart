<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\GuestbookController;
use App\Http\Controllers\BackofficeController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::resource('/articles', ArticlesController::class);
Route::resource('/events', EventsController::class);
Route::resource('/gallery', GalleryController::class);
Route::resource('/guestbook', GuestbookController::class);
Route::resource('/backoffice', BackofficeController::class);

require __DIR__.'/auth.php';

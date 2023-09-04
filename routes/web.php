<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\C_User;
use App\Http\Controllers\C_Home;
use App\Http\Controllers\C_Movie;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $data = [];
    return view('welcome')->with($data);
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


// Home Route
Route::get('/home', [C_Home::class, 'index'])->name('home');


Route::get('/user/{id}', [C_User::class, 'show']);

Route::get('/user/{id}', [C_User::class, 'show']);

// Movies
Route::get('/movie/', [C_Movie::class, 'index']);
Route::get('/movie/id/{id}', [C_Movie::class, 'MovieDetails'])->name('movie.details');
Route::get('/movie/search/', [C_Movie::class, 'MovieSearch'])->name('movie.search');
Route::get('/movie/favorites/{id?}', [C_Movie::class, 'FavoriteMovies'])->name('movie.favorites');
Route::post('j/movie/favorite/check', [C_Movie::class, 'JFavoriteCheck'])->name('j.fav.check');
Route::post('j/movie/favorite/edit', [C_Movie::class, 'JFavoriteCheck'])->name('j.fav.edit');
Route::post('j/movie/favorite/add', [C_Movie::class, 'JFavoriteCheck'])->name('j.fav.add');
Route::post('j/movie/favorite/remove', [C_Movie::class, 'JFavoriteCheck'])->name('j.fav.remove');
Route::get('j/movie/favorites', [C_Movie::class, 'JFavoriteMovies'])->name('j.user.favorites');

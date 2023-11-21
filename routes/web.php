<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\ProfileController;
use App\Models\Film;
use Database\Seeders\FilmSeeder;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/index', [FilmController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('films', FilmController::class);
/*
GET 	    /films 	                index 	films.index
GET 	    /films/create 	        create 	films.create
POST 	    /films 	                store   films.store
GET 	    /films/{photo} 	        show 	films.show
GET 	    /films/{photo}/edit 	edit 	films.edit
PUT/PATCH 	/films/{photo} 	        update 	films.update
DELETE 	    /films/{photo} 	        destroy films.destroy
*/

Route::get('/films-like/{film}', [FilmController::class, 'ponerlikes'])->name('films.likes.poner');

Route::get('/films-liked', [FilmController::class, 'verlikes'])->name('films.likes.ver');

Route::get('/monedero', [ProfileController::class, 'tienda'])->name('profile.monedero');
Route::get('/monedero-add', [ProfileController::class, 'añadircreditos'])->name('profile.monedero.add');

require __DIR__.'/auth.php';

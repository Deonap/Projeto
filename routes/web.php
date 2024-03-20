<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\PrioridadeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjetoController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(UserController::class)->prefix('users')->name('users')->middleware('auth')->group(function () {
    Route::get('/', 'index')->name('.index');
    Route::get('/create', 'create')->name('.create');
    Route::post('/store', 'store')->name('.store');
    Route::get('/edit/{user}', 'edit')->name('.edit');
    Route::put('/update/{user}', 'update')->name('.update');
    Route::delete('/destroy/{user}', 'destroy')->name('.destroy');
});

Route::controller(ClientController::class)->prefix('clientes')->name('clientes')->middleware('auth')->group(function () {
    Route::get('/', 'index')->name('.index');
    Route::get('/create', 'create')->name('.create');
    Route::post('/store', 'store')->name('.store');
    Route::get('/edit/{cliente}', 'edit')->name('.edit');
    Route::get('/show/{cliente}', 'show')->name('.show');
    Route::put('/update/{cliente}', 'update')->name('.update');
    Route::delete('/destroy/{cliente}', 'destroy')->name('.destroy');
});

Route::controller(ProjetoController::class)->prefix('projetos')->name('projetos')->middleware('auth')->group(function () {
    Route::get('/', 'index')->name('.index');
    Route::get('/create', 'create')->name('.create');
    Route::post('/store', 'store')->name('.store');
    Route::get('/edit/{projeto}', 'edit')->name('.edit');
    Route::put('/update/{projeto}', 'update')->name('.update');
    Route::delete('/destroy/{projeto}', 'destroy')->name('.destroy');
});

Route::controller(PrioridadeController::class)->prefix('prioridades')->name('prioridades')->middleware('auth')->group(function () {
    Route::get('/', 'index')->name('.index');
    Route::get('/create', 'create')->name('.create');
    Route::post('/store', 'store')->name('.store');
    Route::get('/edit/{prioridade}', 'edit')->name('.edit');
    Route::put('/update/{prioridade}', 'update')->name('.update');
    Route::delete('/destroy/{prioridade}', 'destroy')->name('.destroy');
});


require __DIR__ . '/auth.php';

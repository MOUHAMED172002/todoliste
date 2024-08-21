<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TaskController;
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

Route::get('/', [TaskController::class, 'home'])->name('home');

//Ensenble des routes qui concerne les taches
Route::prefix('task')->name('task.')->controller(TaskController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/new', 'create')->name('create');
    Route::post('/new/store', 'store');
    Route::get('/update/{id}', 'update')->name('update');
    Route::post('/update/store', 'storeUpdate');
    Route::get('/destroy/{id}', 'destroy');
});

//Ensemble des routes qui concerne les categories
Route::prefix('category')->name('category.')->controller(CategoryController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/new', 'create')->name('create');
    Route::post('/new/store', 'store');
    Route::get('/update/{id}', 'update')->name('update');
    Route::post('/update/store', 'storeUpdate');
    Route::get('/destroy/{id}', 'destroy');
});
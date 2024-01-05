<?php

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

Route::get('/', App\Livewire\Index::class)->name('top');

Route::prefix('posts')
    ->name('posts.')
    ->group(static function () {
        Route::get('', App\Livewire\Posts\Index::class)->name('index');
        Route::get('{post}', App\Livewire\Posts\Show::class)->name('show');
    });

Route::prefix('categories')
    ->name('categories.')
    ->group(static function () {
        Route::get('', App\Livewire\Categories\Index::class)->name('index');
        Route::get('{category}', App\Livewire\Categories\Show::class)->name('show');
    });

Route::prefix('tags')
    ->name('tags.')
    ->group(static function () {
        Route::get('', App\Livewire\Tags\Index::class)->name('index');
        Route::get('{tag}', App\Livewire\Tags\Show::class)->name('show');
    });

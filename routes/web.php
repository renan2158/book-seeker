<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/search', [BookController::class, 'index'])->name('books.index');

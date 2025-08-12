<?php

use Illuminate\Support\Facades\Route;


Route::get('/', \App\Livewire\Home::class)->name('home');
Route::get('/about', \App\Livewire\About::class)->name('about');

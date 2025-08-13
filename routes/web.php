<?php

use Illuminate\Support\Facades\Route;


// Route::get('/', \App\Livewire\Home::class)->name('home');
// Route::get('/about', \App\Livewire\About::class)->name('about');




Route::prefix('/dashboard')->group(function () {

});

Route::prefix('/master')->group(function () {
    Route::get('/product-category',\App\Livewire\Pages\ProductCategory\CategoryList::class)->name('master.category.product');
    Route::get('/product-list',\App\Livewire\Pages\Product\ProductList::class)->name('master.category.product');
});

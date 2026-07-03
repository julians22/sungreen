<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::controller(PageController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/tentang-kami', 'about')->name('about');
    Route::group(['prefix' => 'produk'], function () {
        Route::get('/', 'products')->name('products');
        Route::get('/{slug}', 'productDetail')->name('products.show');
    });
    Route::get('/galeri', 'gallery')->name('gallery');
    Route::get('/hubungi-kami', 'contact')->name('contact');

    Route::post('/hubungi-kami', 'submitContactForm')->name('contact.submit');
});

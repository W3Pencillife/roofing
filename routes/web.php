<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuoteFormController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});
//submit quote message
Route::post('/send-quote', [QuoteFormController::class, 'send'])->name('quote.send');

//Partner Links Path
Route::get('/partners', [PartnerController::class, 'index']);

//service category
Route::get('/services/{slug}', [PostController::class, 'showBySlug'])->name('services.category');







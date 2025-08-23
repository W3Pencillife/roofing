<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuoteFormController;

Route::get('/', function () {
    return view('welcome');
});
//submit quote message
Route::post('/send-quote', [QuoteFormController::class, 'send'])->name('quote.send');



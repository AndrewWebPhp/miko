<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;


Route::get('/reset', function(){
    session()->forget('city_session');
    return redirect()->route('index');
})->name('reset');


Route::prefix('{city?}')->group(function(){
    Route::get('/', [MainController::class, 'index'])->name('index')->defaults('city', null);
    Route::get('/about', [MainController::class, 'about'])->name('about');
    Route::get('/news', [MainController::class, 'news'])->name('news');
});
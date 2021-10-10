<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\DayController;
use App\Http\Controllers\WebsiteController;

use Illuminate\Support\Facades\Route;


Route::get('/', function() {
    return redirect('/register');
});


require __DIR__.'/auth.php';


Route::middleware(['auth'])->group(function() {
    Route::get('/dashboard', [AppController::class, 'dashboard'])->name('dashboard');

    Route::get('/day/new', [DayController::class, 'create']);
    Route::post('/day/new', [DayController::class, 'store']);

    Route::post('/day/update', [DayController::class, 'update']);

    Route::post('/day/delete', [DayController::class, 'delete']);

    Route::get('/day/{day}', [DayController::class, 'single']);
});

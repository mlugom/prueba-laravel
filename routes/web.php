<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistroController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', function () {
    return redirect(route('home'));
})->name('dashboard');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/registros', RegistroController::class);
    Route::get('/registros-json', [RegistroController::class, 'getAll'])->name('registros.json');
});



<?php

use App\Http\Controllers\API\ConcertController;
use App\Http\Controllers\ProfileController;
use App\Models\Concert;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $concerts = Concert::all();
    return view(
        'dashboard',
        [
            'concerts' => $concerts
        ]
    );
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/concerts/{id}', function ($id) {
    return view('concert', [
        'concert' =>  Concert::find($id)
    ]);
});


require __DIR__ . '/auth.php';

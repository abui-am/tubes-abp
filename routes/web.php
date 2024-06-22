<?php

use App\Http\Controllers\API\ConcertController;
use App\Http\Controllers\ProfileController;
use App\Models\Concert;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\Seat;

Route::get('/', function () {
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

Route::get('/concerts/{id}/seats', function ($id) {
    return view('beli-ticket', [
        'user' => auth()->user(),
        'concert' => Concert::find($id),
        'occupied_seats' => Seat::where('concert_id', $id)->get(),
        'vip_seats' =>  ['F1', 'F2', 'F3', 'F4', 'F5', 'F6', 'F7'],
        'regular_seats' => range(1, 42),
    ]);
});


require __DIR__ . '/auth.php';

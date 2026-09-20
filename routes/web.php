<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\DoctorsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ✅ Hospital Routes
    Route::prefix('hospital')->controller(HospitalController::class)->group(function () {
        Route::get('/', 'app');
        Route::get('add', 'add');
        Route::post('create', 'store');
        Route::get('edit/{id}', 'edit');
        Route::post('update/{id}', 'update');
        Route::get('delete/{id}', 'delete');
    });

    // ✅ Doctor Routes — Alias 'doctor' use karein
    Route::prefix('doctor')->controller(DoctorsController::class)->middleware('doctor')->group(function () {
        Route::get('/', 'index');
        Route::view('add', 'doctor.add');
        Route::post('create', 'store');
        Route::get('edit/{id}', 'edit');
        Route::post('update/{id}', 'update');
        Route::delete('delete/{id}', 'delete');
    });

    Route::get('has-one-through', [HospitalController::class, 'hasOneThrough']);
    Route::get('has-many-through', [HospitalController::class, 'hasManyThrough']);
});

require __DIR__.'/auth.php';
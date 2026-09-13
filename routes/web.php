<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HospitalController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('hospital', [HospitalController::class, 'app']);

Route::get('add-data', [HospitalController::class, 'addData']);
Route::get('get-data', [HospitalController::class, 'getData']);
Route::get('update-data', [HospitalController::class, 'updateData']);
Route::get('delete-data', [HospitalController::class, 'deleteData']);

Route::get('restore-data', [HospitalController::class, 'restoreData']);
Route::get('force-delete', [HospitalController::class, 'forceDelete']);
<?php

use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\FifthTestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('details')->group(function () {
    Route::get('students', function () {
        return 'this is student';
    });

    Route::get('teachers', function () {
        return 'this is teacher';
    });
});

Route::get('student/{id}/{reg}', function ($id, $reg) {
    return 'student number '. $id .' registration number '. $reg;
});

Route::fallback(function () {
    return 'this page is no found please try again';
});

// ✅ About Us - Sirf 1 baar
Route::get('about-us', function () {
    $name = "Tester";
    $email = "tester@gmail.com";
    return view('aboutus')->with('name', $name)->with('email', $email);
});

// ✅ Contact Us - Sirf 1 baar (GET)
Route::view('contact-us', 'contactus', ['name' => 'Tester', 'email' => 'tester@gmail.com']);

// ✅ Contact Us - POST (form submit ke liye)
Route::post('contact-us', function () {
    return back()->with('success', 'Your message has been sent successfully!');
});












use App\Http\Controllers\HospitalController;
use App\Http\Controllers\TestController;
use App\Models\Doctors;

Route::get('/', function () {
    return view('welcome');
});

// Hospital Controller Routes
Route::get('patients', [HospitalController::class, 'index']);
Route::get('about-us', [HospitalController::class, 'aboutUs']);

// Contact Routes
Route::view('contact-us', 'contactus', ['name' => 'Tester', 'email' => 'tester@gmail.com']);
Route::post('contact-us', function () {
    return back()->with('success', 'Your message has been sent successfully!');
});

// Fallback
Route::fallback(function () {
    return 'Page not found!';
});
Route::prefix('details')->group(function () {
    Route::get('patients', function () {
        return 'this is patient';
    });

    Route::get('doctors', function () {
        return 'this is doctor';
    });
});

Route::get('invoke', TestController::class);

Route::resource('fifth-test', FifthTestController::class);

Route::get('doctors', function(){
    return Doctors::all();
    });


Route::get('add-data', [HospitalController::class, 'addData']);
Route::get('get-data', [HospitalController::class, 'getData']);
Route::get('update-data', [HospitalController::class, 'updateData']);
Route::get('delete-data', [HospitalController::class, 'deleteData']);
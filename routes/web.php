<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/enquiry', function () {
    return view('enquiry.create');
});

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact', [\App\Http\Controllers\ContactFormController::class, 'submit'])->name('contact.submit');
Route::resource('/enquiries', \App\Http\Controllers\EnquiryController::class);

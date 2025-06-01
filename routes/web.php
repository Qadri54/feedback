<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedbackController;

// Halaman Utama
Route::get('/', function () {
    return redirect()->route('feedback.index');
});

// CRUD untuk Feedback (menggunakan resource)
Route::resource('feedback', FeedbackController::class);


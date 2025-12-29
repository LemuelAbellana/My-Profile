<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Additional routes can be added here
// Route::get('/resume', [ResumeController::class, 'download'])->name('resume.download');

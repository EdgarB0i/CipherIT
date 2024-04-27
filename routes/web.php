<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CreateNotesController;
use App\Http\Controllers\ViewNotesController;

Route::get('/', function () {
    return view('welcome');
});

// Sign Up Routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Login Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Profile Route
Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile');

// Create notes
Route::get('/notes/create', [CreateNotesController::class, 'create'])->name('notes.create');
Route::post('/notes/store', [CreateNotesController::class, 'store'])->name('notes.store');

// View Notes
Route::get('/notes', [ViewNotesController::class, 'index'])->name('notes.index')->middleware('auth');
Route::get('/notes/{id}', [ViewNotesController::class, 'getNoteText'])->name('notes.getNoteText')->middleware('auth');

// Delete Note Route
Route::delete('/notes/{id}', [ViewNotesController::class, 'destroy'])->name('notes.destroy')->middleware('auth');

<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('industry', 'livewire.industry.industry')
    ->middleware(['auth', 'verified', 'role:super-admin|Student|Teacher'])
    ->name('industry');

Route::view('internship', 'livewire.internship.internship')
    ->middleware(['auth', 'verified', 'role:super-admin|Student|Teacher'])
    ->name('internship');

Route::view('student', 'livewire.student.student')
    ->middleware(['auth', 'verified'])
    ->name('student');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__ . '/auth.php';

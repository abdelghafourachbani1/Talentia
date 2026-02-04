<?php

use App\Livewire\ProfileForm;
use App\Models\JobOffer;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')->middleware(['auth'])
    ->name('profile');

Route::get('/offers', function () {
    return view('offers');
});

Route::get('/ProfileForm', [ProfileForm::class, 'render']);

Route::get('/job-offers/{id}', function ($id) {
    $offer = JobOffer::findOrFail($id);
    return view('job-offers.show', compact('offer'));
})->name('job.offers.show');


require __DIR__.'/auth.php';

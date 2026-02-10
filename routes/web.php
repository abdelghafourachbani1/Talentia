<?php

use App\Livewire\ProfileForm;
use App\Livewire\Recruiter\ManageOffers;
use App\Livewire\Recruiter\ViewApplications;
use App\Models\JobOffer;
use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::view('/offers', 'offers')->name('offers.index');
Route::view('/users', 'users.index')->name('users.index')->middleware('auth');


Route::get('/profile-form', ProfileForm::class)
    ->middleware(['auth'])
    ->name('profile.form');

Route::get('/job-offers/{id}', function ($id) {
    $offer = JobOffer::findOrFail($id);
    return view('job-offers.show', compact('offer'));
})->name('job.offers.show');

Route::get('/users/{id}', function ($id) {
    $user = User::findOrFail($id);
    return view('users.show', compact('user'));
})->name('users.show')->middleware('auth');

Route::get('/recruiter/offers', ManageOffers::class)
    ->middleware(['auth', 'role:recruiter'])
    ->name('recruiter.offers');

Route::get('/recruiter/offers/create', \App\Livewire\Recruiter\CreateOffer::class)
    ->middleware(['auth', 'role:recruiter'])
    ->name('recruiter.offers.create');

Route::get('/recruiter/offers/{jobOfferId}/applications', ViewApplications::class)
    ->middleware(['auth', 'role:recruiter'])
    ->name('recruiter.offers.applications');

require __DIR__ . '/auth.php';


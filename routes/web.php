<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\VoterController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\CandidateController;


// admin
Route::prefix('admin')->name('admin.')->group(function () {

//voter-management

     Route::view('/dashboard','admin.dashboard')
        ->name('dashboard');

    Route::resource('voters', VoterController::class)->except(['show']);;
   
    //candidate-management
    Route::resource('candidates', CandidateController::class)->except(['show']);

    Route::post('/candidates/filter', [CandidateController::class, 'filter'])
        ->name('candidates.filter');

    Route::view('/locations/index','admin.locations.index')
        ->name('locations.index');

    Route::view('/locations/create','admin.locations.create')
        ->name('locations.create');

    Route::get('/get-districts/{province}', [LocationController::class, 'districts']);
    Route::get('/get-municipalities/{district}', [LocationController::class, 'municipalities']);
    Route::get('/get-wards/{municipality}', [LocationController::class, 'wards']);


});




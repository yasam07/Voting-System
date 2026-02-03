<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\VoterController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\CandidateController;
use App\Http\Controllers\Admin\ProvinceController;
use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\MunicipalityController;
use App\Http\Controllers\Admin\WardController;



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


    //Province-management

    

    
    
    

    

   

    Route::get('/get-districts/{province}', [LocationController::class, 'districts']);
    Route::get('/get-municipalities/{district}', [LocationController::class, 'municipalities']);
    Route::get('/get-wards/{municipality}', [LocationController::class, 'wards']);


});

Route::prefix('admin/locations')->name('admin.locations.')->group(function () {

    Route::resource('provinces', ProvinceController::class);

    Route::resource('districts', DistrictController::class)->except(['show']);

    Route::resource('municipalities', MunicipalityController::class)->except(['show']);

    Route::resource('wards', WardController::class)->except(['show']);

    
});




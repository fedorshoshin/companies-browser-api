<?php

use App\Http\Controllers\HouseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\OccupationController;

Route::prefix('organizations')->group(function () {

    Route::get('', [OrganizationController::class, 'index']);

    Route::get('search/by-occupation-name', [OrganizationController::class, 'byOccupationName']);
    Route::get('search/by-name', [OrganizationController::class, 'byName']);
    Route::get('by-location', [OrganizationController::class, 'byLocation']);

    Route::get('{id}', [OrganizationController::class, 'show']);

    Route::get('by-house/{id}', [OrganizationController::class, 'byHouse']);


    Route::get('by-occupation/{occupation}', [OrganizationController::class, 'byOccupation']);

});

Route::get('houses', [HouseController::class, 'index']);
Route::get('occupations', array(OccupationController::class, 'index'));

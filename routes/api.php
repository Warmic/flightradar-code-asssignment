<?php

use App\Http\Controllers\TicketController;
use App\Http\Resources\AirportResource;
use App\Http\Resources\FlightResource;
use App\Http\Resources\PassportResource;
use App\Models\Airport;
use App\Models\Flight;
use App\Models\Passport;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')->group(function() {
    Route::apiResource('tickets', TicketController::class)->only([
        'store',
        'update`',
        'destroy',
    ]);

    Route::get('/passports', function() {
        return PassportResource::collection(Passport::get());
    });

    Route::get('/flights', function() {
        return FlightResource::collection(Flight::get());
    });

    Route::get('/airports', function() {
        return AirportResource::collection(Airport::get());
    });
});



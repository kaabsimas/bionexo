<?php

use App\Http\Controllers\ProfessionalController;
use App\Http\Controllers\SpecialityController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth', 'verified'])->group(function() {
    Route::post('/tokens/create', function (Request $request) {
        $token = $request->user()->createToken('internal-token');
     
        return ['token' => $token->plainTextToken];
    });
});

Route::middleware('auth:sanctum')->get('/specialities', [SpecialityController::class, 'index'])->name('specialities.index');
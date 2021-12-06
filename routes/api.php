<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamsGeneratorApiController;

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

Route::get('/all-generated', [TeamsGeneratorApiController::class, 'index']);

Route::post('/generate', [TeamsGeneratorApiController::class, 'store']);

Route::post('/generate-teams', [TeamsGeneratorApiController::class, 'generateRandomTeams']);

Route::get('/teams', [TeamsGeneratorApiController::class, 'getTeams']);

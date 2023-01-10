<?php

use App\Http\Controllers\MusicController;
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

Route::get('musics',[MusicController::class,'allMusic']);
Route::post('musics',[MusicController::class,'store']);
Route::get('musics/show/{id}',[MusicController::class,'show']);
Route::put('musics/update/{id}',[MusicController::class,'update']);
Route::get('musics/delete/{id}',[MusicController::class,'destroy']);

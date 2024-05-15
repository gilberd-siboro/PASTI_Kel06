<?php

use App\Http\Controllers\SektorController;
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

Route::get('/sektor',[SektorController::class,'allSektor'])->name('api.sektor');
Route::get('/sektor/{id}',[SektorController::class,'sektorByid'])->name('api.sektorid');
Route::post('/postsektor',[SektorController::class,'createSektor'])->name('api.postsektor');
Route::patch('/updatesektor/{id}',[SektorController::class, 'updateSektor'])->name('api.updatesektor');
Route::delete('/deletesektor/{id}',[SektorController::class, 'deleteSektor'])->name('api.deletesektor');

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApipostController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('posts', [ApipostController::class,'index']);
Route::get('/posts/featured', [ApipostController::class,'featured']);
Route::get('/posts/search',[ApipostController::class,'search']);
Route::get('/posts/categories',[ApipostController::class,'categories']);
Route::get('/posts/listcategories',[ApipostController::class,'listcategories']);
Route::get('/posts/mostpopular',[ApipostController::class,'mostpopular']);
Route::put('/posts/views/{id}',[ApipostController::class,'views']);
Route::post('/posts/loved',[ApipostController::class,'loved']);
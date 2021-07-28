<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ReportController;
use App\Http\Controllers\AuthController;
use App\Models\Report;


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

// публичные пути что в доступе для всех
Route::get('/reports', [ReportController::class, 'index']);
//Route::resource('reports', ReportController::class);

// Пользователь - регистрация/вход
Route::post('/signup', [AuthController::class, 'register']);
Route::post('/signin', [AuthController::class, 'login']);

// Защищенные пути через Laravel/Sanctum
Route::group(['middleware' => ['auth:sanctum']], function(){
    //Route::get('/reports', [ReportController::class, 'index']);
    Route::post('/reports', [ReportController::class, 'store']);
    Route::put('/reports/{$id}', [ReportController::class, 'update']);
    Route::put('/reports/{$id}', [ReportController::class, 'destroy']);
    // Пользователь - выход
    Route::post('/signout', [AuthController::class, 'logout']);
    // Поиск
    Route::get('/reports/search/{full_name}', [ReportController::class, 'search']);
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

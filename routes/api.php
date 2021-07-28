<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ReportController;
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

Route::resource('reports', ReportController::class);
Route::get('/reports/search/{full_name}', [ReportController::class, 'search']);

// App\Http\Controllers\ReportController->index
// Route::get('/reports', [ReportController::class, 'index']);

// Route::post('/reports', [ReportController::class, 'store']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

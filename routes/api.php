<?php

use App\Http\Controllers\TransactionController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/package/{slug}', [PackageController::class, 'show']);
// Route::patch('package/{id}', 'PackageController@patch');
// Route::apiResources(['package' => TransactionController::class])

Route::get('/package', [TransactionController::class, 'index']);
Route::get('/package/{id}', [TransactionController::class, 'show']);
Route::post('/package', [TransactionController::class, 'create']);
Route::patch('/package/{id}', [TransactionController::class, 'patch']);
Route::put('/package/{id}', [TransactionController::class, 'update']);
Route::delete('/package/{id}', [TransactionController::class, 'delete']);

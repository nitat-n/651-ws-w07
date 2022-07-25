<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VaccineController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\ProgramController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
// API routes
Route::resource('/vaccine', VaccineController::class);
Route::get('/vaccine/search/{name}', [VaccineController::class,'search']);
Route::resource('/student', StudentController::class);
Route::get('/faculty/graph-faculty', [FacultyController::class,'graphFaculty']);
Route::resource('/faculty', FacultyController::class);
Route::resource('/program', ProgramController::class);
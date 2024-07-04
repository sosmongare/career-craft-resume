<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\TemplateController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/templates', [TemplateController::class, 'index']);
Route::post('/templates', [TemplateController::class, 'store']);
Route::get('/templates/{id}', [TemplateController::class, 'show']);
Route::get('/resumes', [ResumeController::class, 'index']);
Route::post('/resumes', [ResumeController::class, 'store']);
Route::get('/resumes/{id}', [ResumeController::class, 'show']);
Route::put('/resumes/{id}', [ResumeController::class, 'update']);
Route::get('/resumes/{id}/download', [ResumeController::class, 'downloadPDF']);
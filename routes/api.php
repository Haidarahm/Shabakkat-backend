<?php

use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\ContentController;
use App\Http\Controllers\Api\FaqController;
use App\Http\Controllers\Api\OpeningApplicationController;
use Illuminate\Support\Facades\Route;

Route::get('/health', fn () => response()->json(['ok' => true]));

Route::get('/projects', [ContentController::class, 'projects']);
Route::get('/projects/{slug}', [ContentController::class, 'project']);
Route::get('/featured-projects', [ContentController::class, 'featuredProjects']);

Route::get('/service-categories', [ContentController::class, 'serviceCategories']);
Route::get('/services', [ContentController::class, 'services']);

Route::get('/industries', [ContentController::class, 'industries']);
Route::get('/industries/{slug}', [ContentController::class, 'industry']);

Route::get('/partners', [ContentController::class, 'partners']);
Route::get('/certifications', [ContentController::class, 'certifications']);
Route::get('/offices', [ContentController::class, 'offices']);
Route::get('/stats', [ContentController::class, 'stats']);
Route::get('/testimonials', [ContentController::class, 'testimonials']);
Route::get('/awards', [ContentController::class, 'awards']);
Route::get('/openings', [ContentController::class, 'openings']);
Route::post('/openings/apply', [OpeningApplicationController::class, 'store']);

Route::get('/faqs', [FaqController::class, 'index']);

Route::post('/contact', [ContactController::class, 'store']);

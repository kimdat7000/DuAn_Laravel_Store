<?php

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiCategoriesController;
use App\Http\Controllers\apiProductController as ProductController;
use App\Http\Controllers\PostController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('products', [ProductController::class, 'index']);
Route::get('products_lasted', [ProductController::class, 'products_lasted']);
Route::get('products_bestseller', [ProductController::class, 'products_bestseller']);
Route::get('products/{id}', [ProductController::class, 'show']);
Route::post('products', [ProductController::class, 'store']);
Route::put('products/{id}', [ProductController::class, 'update']);
Route::delete('products/{id}', [ProductController::class, 'delete']);

Route::get('categories', [ApiCategoriesController::class, 'index']);
Route::get('categories/{id}', [ApiCategoriesController::class, 'show']);
Route::post('categories', [ApiCategoriesController::class, 'store']);
Route::put('categories/{id}', [ApiCategoriesController::class, 'update']);
Route::delete('categories/{id}', [ApiCategoriesController::class, 'delete']);

Route::apiResource('posts', PostController::class);

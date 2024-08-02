<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;

Route::get('/products', [CrudController::class, 'index']);

Route::get('/products/{id}', [CrudController::class, 'show']);

Route::post('/products', [CrudController::class, 'store']);

Route::put('/products/{id}', [CrudController::class, 'update']);

Route::delete('/products/{id}', [CrudController::class, 'destroy']);

<?php

use App\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
}); */


Route::get("/", [CrudController::class, "index"])->name("crud.index");

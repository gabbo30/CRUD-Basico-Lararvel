<?php

use App\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
}); */


Route::get("/", [CrudController::class, "index"])->name("crud.index");

Route::post("/agregar", [CrudController::class, "create"])->name("crud.create");

Route::post("/editar", [CrudController::class, "update"])->name("crud.update");

Route::get("/eliminar-{id}", [CrudController::class, "delete"])->name("crud.delete");

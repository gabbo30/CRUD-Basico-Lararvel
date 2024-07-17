<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrudController extends Controller
{
    //
    public function index()
    {
        $datos = DB::select(" select * from products ");
        return view("welcome")->with("datos", $datos);
    }
}

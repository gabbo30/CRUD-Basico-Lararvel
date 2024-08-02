<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class CrudController extends Controller
{
    //
    /* public function index()
    {
        $datos = DB::select(" select * from products ");
        return view("welcome")->with("datos", $datos);
    } */
   // Mostrar una lista de productos
   public function index()
   {
       $productos = Product::all(); // Obtiene todos los productos usando Eloquent
       return response()->json($productos); // Devuelve los datos en formato JSON
   }

    public function create(Request $request)
    {
        $sql=DB::insert(" insert into products (product_name, price, stock) values (?, ?, ?) ",[
            $request->nombre,
            $request->precio,
            $request->stock
        ]);
        if ($sql==true)
        {
            return back()->with("Bien", "Producto registrado");
        }
        else
        {
            return back()->with("Error", "Producto NO registrado");
        }
        // return 0;
    }

    public function update(Request $request)
    {
        $sql=DB::insert(" update products set product_name = ?, price = ?, stock = ? where id = ? ",[
            $request->nombre,
            $request->precio,
            $request->stock,
            $request->codigo
        ]);
        if ($sql==true)
        {
            return back()->with("Bien", "Producto actualizado");
        }
        else
        {
            return back()->with("Error", "Producto NO actualizado");
        }
        // return 0;
    }

    public function delete($id)
    {
        $sql=DB::delete(" delete from products where id = ?",[
            $id
        ]);
        if ($sql==true)
        {
            return back()->with("Bien", "Producto Eliminado");
        }
        else
        {
            return back()->with("Error", "Producto NO Eliminado");
        }
    }

}

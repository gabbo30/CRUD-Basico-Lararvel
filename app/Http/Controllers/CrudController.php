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
    public function index()
    {
        // $datos = DB::select(" select * from products ");
        $datos = Product::all();
        return view("welcome")->with("datos", $datos);
    }
   
   /* public function index() //Aun no apto para ser consumido por VueJS
   {
       $productos = Product::all(); // Obtiene todos los productos usando Eloquent
       return response()->json($productos); // Devuelve los datos en formato JSON
   } */

    public function create(Request $request)
    {
        $sql = Product::create([
            'product_name' => $request->nombre,
            'price' => $request->precio,
            'stock' => $request->stock,
        ]);
        if ($sql==true)
        {
            return redirect()->route('crud.index')->with("Bien", "Producto registrado");
        }
        else
        {
            return redirect()->route('crud.index')->with("Error", "Producto NO registrado");
        }
    }

    public function update(Request $request)
    {
        $sql = Product::find($request->codigo);
        $sql->update([
            'product_name' => $request->nombre,
            'price' => $request->precio,
            'stock' => $request->stock,
        ]);
        if ($sql==true)
        {
            return redirect()->route('crud.index')->with("Bien", "Producto actualizado");
        }
        else
        {
            return redirect()->route('crud.index')->with("Error", "Producto NO actualizado");
        }
    }

    public function delete($id)
    {
        $product = Product::find($id);

        if ($product)
        {
            $product->delete();
            return redirect()->route('crud.index')->with('success', 'Producto eliminado exitosamente');
        }
        else
        {
            return redirect()->route('crud.index')->with('error', 'Producto no encontrado');
        }
    }
    // Eloquent ORM Implementado Correctamente

}

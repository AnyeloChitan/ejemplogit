<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;

class DashboardController extends Controller
{
    //
    public function index(){
     //productos
     $totalProductos=Producto::count();
     $productosEnStock=Producto::where('stock','>',0)->count();

     //categorias
     $totalCategorias=Categoria::count();
     $activasCategorias=Categoria::where('status',1)->count();

     //productos por categoria

     $productosPorCategoria=Categoria::select('nombre')
     ->withCount('productos')
     ->get();
     //preparar datos para enviar al la vista y al grafica
     $labels=$productosPorCategoria->pluck('nombre');
     $data=$productosPorCategoria->pluck('productos_count');

     //dd($productosPorCategoria->toArray(),$labels->toArray(),$data->toArray());
      
     return view('dashboard',compact([
        'totalProductos',
        'productosEnStock',
        'totalCategorias',
        'activasCategorias',
        'labels',
        'data'

     ]));

    }
}

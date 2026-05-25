<?php
 
namespace App\Http\Controllers;
 
use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;
 

    class CategoriaController extends Controller
{
    /**
     * Muestra la lista de todas las categorías.
     */
    public function index()
    {
        // Obtiene todas las categorías e incluye sus productos
        $categorias = Categoria::with('productos')->get();
 
        // Retorna la vista y le pasa la variable $categorias
        return view('categorias.index', compact('categorias'));
    }
}




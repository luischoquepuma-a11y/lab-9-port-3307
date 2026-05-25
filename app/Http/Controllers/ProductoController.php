<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::with('categoria')->get();
        return view('productos.index', compact('productos'));
    }

    public function galeria()
    {
        $categoriaId = request('categoria');

        $productos = Producto::with('categoria')
            ->when($categoriaId, fn($q) => $q->where('id_categoria', $categoriaId))
            ->get();

        $categorias = Categoria::all();

        return view('productos.galeria', compact('productos', 'categorias'));
    }

    public function show($id)
    {
        $producto = Producto::with('categoria')->findOrFail($id);
        return view('productos.show', compact('producto'));
    }
}


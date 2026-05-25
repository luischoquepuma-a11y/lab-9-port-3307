{{-- resources/views/productos/show.blade.php --}}
@extends('layouts.app')
@section('titulo', $producto->nombre)
 
@section('contenido')
<a href="{{ route('productos.galeria') }}" class="btn btn-outline"
   style="margin-bottom:2rem">&larr; Volver a la galería</a>

<div class="card" style="display:flex; gap:2.5rem; flex-wrap:wrap; padding:2.5rem">

    {{-- Imagen --}}
    <div style="flex:0 0 340px">
        @if($producto->foto && file_exists(public_path('img/productos/' . $producto->foto)))
            <img src="{{ asset('img/productos/' . $producto->foto) }}"
                 alt="{{ $producto->nombre }}"
                 style="width:100%; border-radius:var(--radius-md); box-shadow:var(--shadow-lg)">
        @else
            <div class="no-foto" style="height:300px; border-radius:var(--radius-md);">Sin imagen</div>
        @endif
    </div>

    {{-- Informacion --}}
    <div style="flex:1; min-width:280px">
        <h1 style="color:var(--green-900); margin-bottom:.5rem; font-size:1.8rem">{{ $producto->nombre }}</h1>
        <p style="color:var(--text-light); margin-bottom:1.5rem; font-size:1.05rem">Marca: <strong>{{ $producto->marca }}</strong></p>

        <table style="margin-top:0">
            <tr><td style="font-weight:700; width:150px; color:var(--green-800)">Precio</td>
                <td style="font-size:1.1rem; font-weight:600">S/. {{ number_format($producto->precio, 2) }}</td></tr>
            <tr><td style="font-weight:700; color:var(--green-800)">Stock disponible</td>
                <td>{{ $producto->stock }} unidades</td></tr>
            <tr><td style="font-weight:700; color:var(--green-800)">Categoría</td>
                <td>{{ $producto->categoria->descripcion ?? 'Sin categoría' }}</td></tr>
        </table>

        <div style="margin-top:2.5rem">
            <form action="{{ route('carrito.agregar', $producto->id_producto) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success btn-lg">Agregar al carrito</button>
            </form>
        </div>
    </div>
</div>
@endsection


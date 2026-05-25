{{-- resources/views/home.blade.php --}}
@extends('layouts.app')
@section('titulo', 'Inicio')
@section('contenido')
 
@auth
    <div class="alert alert-success">
        Bienvenido, <strong>{{ Auth::user()->name }}</strong>.
        Tienes acceso completo al sistema.
    </div>
@endauth
 
<div class="card">
    <h1 style="color:var(--primary-dk); margin-bottom:.5rem">Panel de Administracion</h1>
    <p style="color:var(--text-light); margin-bottom:2rem">
        Resumen general del catalogo de productos.
    </p>
 
    <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(220px,1fr)); gap:2rem">
        <div style="background:var(--green-700); color:#fff; border-radius:var(--radius-xl);
                    padding:2.5rem 2rem; text-align:center; box-shadow:var(--shadow-lg)">
            <div style="font-size:3rem; font-weight:800">{{ $totalCategorias }}</div>
            <div style="margin-top:.5rem; opacity:.88; font-size:1rem; letter-spacing:.5px">Categorías</div>
        </div>
        <div style="background:var(--green-800); color:#fff; border-radius:var(--radius-xl);
                    padding:2.5rem 2rem; text-align:center; box-shadow:var(--shadow-lg)">
            <div style="font-size:3rem; font-weight:800">{{ $totalProductos }}</div>
            <div style="margin-top:.5rem; opacity:.88; font-size:1rem; letter-spacing:.5px">Productos</div>
        </div>
    </div>
 
    <div style="margin-top:2rem; display:flex; gap:1rem; flex-wrap:wrap">
        <a href="{{ route('productos.galeria') }}" class="btn btn-primary">Ver Galeria</a>
        <a href="{{ route('categorias.index') }}" class="btn btn-outline">Ver Categorias</a>
        <a href="{{ route('productos.index') }}" class="btn btn-outline">Ver Productos</a>
    </div>
</div>
 
@endsection




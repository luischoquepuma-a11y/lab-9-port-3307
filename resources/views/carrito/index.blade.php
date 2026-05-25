{{-- resources/views/carrito/index.blade.php --}}
@extends('layouts.app')
@section('titulo', 'Mi Carrito')
 
@section('contenido')
<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:1.5rem">
    <h1 style="color:var(--primary-dk); margin:0">Mi Carrito de Compras</h1>
    <a href="{{ route('productos.galeria') }}" class="btn btn-outline">
        &larr; Seguir comprando
    </a>
</div>
 
@if(empty($productos))
    <div class="card" style="text-align:center; padding:3rem">
        <p style="font-size:1.1rem; color:var(--text-light); margin-bottom:1.5rem">
            Tu carrito esta vacio.
        </p>
        <a href="{{ route('productos.galeria') }}" class="btn btn-primary btn-lg">
            Ver galeria de productos
        </a>
    </div>
@else
    <div style="background:var(--card-bg); border-radius:var(--radius); box-shadow:var(--shadow); border:1px solid var(--border); padding:1rem 1.5rem; margin-bottom:1rem; display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:.5rem">
        <div>
            <strong style="color:var(--primary-dk)">Pedido de:</strong>
            <span style="color:var(--text)">{{ Auth::user()->name }}</span>
        </div>
        <div>
            <strong style="color:var(--primary-dk)">Fecha:</strong>
            <span style="color:var(--text)">{{ now()->format('d/m/Y h:i A') }}</span>
        </div>
    </div>

    <div class="card">
        <table>
            <thead>
                <tr>
                    <th style="width:80px">Imagen</th>
                    <th>Producto</th>
                    <th>Precio unit.</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $item)
                <tr>
                    <td>
                        @if($item['producto']->foto && file_exists(public_path('img/productos/' . $item['producto']->foto)))
                            <img src="{{ asset('img/productos/' . $item['producto']->foto) }}"
                                 style="width:60px; height:60px; object-fit:cover; border-radius:6px">
                        @else
                            <div style="width:60px;height:60px;background:#eee;border-radius:6px;"></div>
                        @endif
                    </td>
                    <td>
                        <strong>{{ $item['producto']->nombre }}</strong><br>
                        <span style="color:var(--text-light);font-size:.85rem">{{ $item['producto']->marca }}</span>
                    </td>
                    <td>S/. {{ number_format($item['producto']->precio, 2) }}</td>
                    <td>
                        <div style="display:flex; align-items:center; gap:.5rem">
                            <form action="{{ route('carrito.quitar', $item['producto']->id_producto) }}" method="POST">
                                @csrf
                                <button class="btn btn-danger btn-sm">-</button>
                            </form>
                            <strong>{{ $item['cantidad'] }}</strong>
                            <form action="{{ route('carrito.agregar', $item['producto']->id_producto) }}" method="POST">
                                @csrf
                                <button class="btn btn-success btn-sm">+</button>
                            </form>
                        </div>
                    </td>
                    <td><strong>S/. {{ number_format($item['subtotal'], 2) }}</strong></td>
                    <td>
                        <form action="{{ route('carrito.quitar', $item['producto']->id_producto) }}" method="POST">
                            @csrf
                            {{-- Quitar todas las unidades de este producto --}}
                            <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Quitar este producto del carrito?')">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
 
        {{-- Resumen y acciones --}}
        <div style="display:flex; justify-content:flex-end; margin-top:1.5rem; gap:1rem; align-items:center; flex-wrap:wrap">
            <form action="{{ route('carrito.vaciar') }}" method="POST">
                @csrf
                <button class="btn btn-outline" onclick="return confirm('Vaciar el carrito?')">
                    🗑 Vaciar carrito
                </button>
            </form>
            <div style="font-size:1.5rem; font-weight:800; color:var(--primary); background:#E8F5E9; padding:.5rem 1.2rem; border-radius:8px">
                Total: S/. {{ number_format($total, 2) }}
            </div>
            <button class="btn btn-primary btn-lg" onclick="alert('Funcion de pago no implementada aun.')">
                Proceder al pago →
            </button>
        </div>
    </div>
@endif
@endsection


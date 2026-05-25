{{-- resources/views/carrito/index.blade.php --}}
@extends('layouts.app')
@section('titulo', 'Mi Carrito')
 
@section('contenido')
<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:2rem">
    <h1 style="color:var(--green-900); margin:0; font-size:1.75rem">Mi Carrito de Compras</h1>
    <a href="{{ route('productos.galeria') }}" class="btn btn-outline">
        &larr; Seguir comprando
    </a>
</div>

@if(empty($productos))
    <div class="card" style="text-align:center; padding:3.5rem">
        <p style="font-size:1.15rem; color:var(--text-light); margin-bottom:2rem">
            Tu carrito está vacío.
        </p>
        <a href="{{ route('productos.galeria') }}" class="btn btn-primary btn-lg">
            Ver galería de productos
        </a>
    </div>
@else
    <div style="background:var(--card-bg); border-radius:var(--radius-md); box-shadow:var(--shadow); border:1px solid var(--border); padding:1.2rem 1.8rem; margin-bottom:1.5rem; display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:.75rem">
        <div>
            <strong style="color:var(--green-900)">Pedido de:</strong>
            <span style="color:var(--text)">{{ Auth::user()->name }}</span>
        </div>
        <div>
            <strong style="color:var(--green-900)">Fecha:</strong>
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
        <div style="display:flex; justify-content:flex-end; margin-top:2rem; gap:1.2rem; align-items:center; flex-wrap:wrap">
            <form action="{{ route('carrito.vaciar') }}" method="POST">
                @csrf
                <button class="btn btn-outline" onclick="return confirm('¿Vaciar el carrito?')">
                    Vaciar carrito
                </button>
            </form>
            <div style="font-size:1.6rem; font-weight:800; color:var(--green-800); background:linear-gradient(135deg,var(--green-100),var(--green-200)); padding:.6rem 1.5rem; border-radius:var(--radius-sm); box-shadow:var(--shadow)">
                Total: S/. {{ number_format($total, 2) }}
            </div>
            <button class="btn btn-primary btn-lg" onclick="alert('Función de pago no implementada aún.')">
                Proceder al pago →
            </button>
        </div>
    </div>
@endif
@endsection


{{-- resources/views/productos/galeria.blade.php --}}
@extends('layouts.app')
@section('titulo', 'Galeria de Productos')
 
@section('contenido')
 
<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:1.5rem; flex-wrap:wrap; gap:1rem">
    <h1 style="color:var(--green-900); margin:0; font-size:1.75rem">
        Galería de Productos
        <span style="font-size:1.05rem; font-weight:normal; color:var(--text-light); margin-left:.3rem">
            ({{ $productos->count() }} productos)
        </span>
    </h1>
    <div style="display:flex; gap:1rem; align-items:center; flex-wrap:wrap">
        <input type="text" id="buscar" placeholder="Buscar producto…"
               onkeyup="filtrarProductos()"
               style="padding:.6rem 1.2rem; border:1.5px solid var(--border); border-radius:var(--radius-sm); font-size:.9rem; width:240px; background:#fff; transition:all .2s">
        <select onchange="window.location = this.value ? '{{ route('productos.galeria') }}?categoria=' + this.value : '{{ route('productos.galeria') }}'"
                style="padding:.6rem 1.2rem; border:1.5px solid var(--border); border-radius:var(--radius-sm); font-size:.9rem; background:#fff; cursor:pointer; transition:all .2s">
            <option value="">Todas las categorías</option>
            @foreach($categorias as $cat)
                <option value="{{ $cat->id_categoria }}" {{ request('categoria') == $cat->id_categoria ? 'selected' : '' }}>
                    {{ $cat->descripcion }}
                </option>
            @endforeach
        </select>
        <a href="{{ route('productos.index') }}" class="btn btn-outline btn-sm">Ver como tabla</a>
    </div>
    <span id="contador-visibles" style="font-size:.88rem;color:var(--text-light);margin-top:.25rem;display:block;width:100%;text-align:right"></span>
</div>
 
@if($productos->isEmpty())
    <div class="alert alert-info">No hay productos registrados aun.</div>
@else
    <div class="galeria-grid">
        @foreach($productos as $producto)
        <div class="producto-card" data-nombre="{{ strtolower($producto->nombre) }}">
 
            {{-- Imagen del producto --}}
            @if($producto->foto && file_exists(public_path('img/productos/' . $producto->foto)))
                <img src="{{ asset('img/productos/' . $producto->foto) }}"
                     alt="{{ $producto->nombre }}">
            @else
                <div class="no-foto">Sin imagen</div>
            @endif
 
            <div class="card-body">
                <h3>{{ $producto->nombre }}</h3>
                <p class="marca">{{ $producto->marca }}</p>
 
                {{-- Badge de stock --}}
                @if($producto->stock == 0)
                    <span class="badge-categoria badge-stock-low">Agotado</span>
                @elseif($producto->stock > 20)
                    <span class="badge-categoria badge-stock-ok">Stock: {{ $producto->stock }}</span>
                @elseif($producto->stock > 5)
                    <span class="badge-categoria badge-stock-warn">Stock: {{ $producto->stock }}</span>
                @else
                    <span class="badge-categoria badge-stock-low">Stock bajo: {{ $producto->stock }}</span>
                @endif
 
                <p class="precio">S/. {{ number_format($producto->precio, 2) }}</p>
            </div>
 
            <div class="card-footer">
                <span class="badge-categoria">{{ $producto->categoria->descripcion ?? 'Sin cat.' }}</span>
                <div style="display:flex; gap:.5rem">
                    <a href="{{ route('productos.show', $producto->id_producto) }}"
                       class="btn btn-outline btn-sm">Ver</a>
                    @if($producto->stock == 0)
                        <span class="btn btn-sm" style="background:#ccc;color:#666;cursor:not-allowed">Agotado</span>
                    @else
                        <form action="{{ route('carrito.agregar', $producto->id_producto) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">+ Carrito</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endif
 
<script>
    function filtrarProductos() {
        const texto = document.getElementById('buscar').value.toLowerCase().trim();
        const cards = document.querySelectorAll('.producto-card');
        let visibles = 0;
        cards.forEach(c => {
            const match = !texto || c.dataset.nombre.includes(texto);
            c.style.display = match ? '' : 'none';
            if (match) visibles++;
        });
        document.getElementById('contador-visibles').textContent =
            visibles + ' producto' + (visibles !== 1 ? 's' : '') + ' mostrado' + (visibles !== 1 ? 's' : '');
    }
</script>
@endsection


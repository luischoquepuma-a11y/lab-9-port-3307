<!-- resources/views/categorias/index.blade.php -->
@extends('layouts.app')
@section('titulo', 'Categorías')
@section('contenido')
    <h1 style="color:var(--green-900);font-size:1.75rem;margin-bottom:1.5rem">Categorías <span style="font-size:1rem;font-weight:normal;color:var(--text-light)">({{ $categorias->count() }} registros)</span></h1>
 
    @if($categorias->isEmpty())
        <p style="color:var(--text-light)">No hay categorías registradas aún.</p>
    @else
        <table>
            <thead><tr><th>#</th><th>Descripción</th><th>N° Productos</th></tr></thead>
            <tbody>
                @foreach($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->id_categoria }}</td>
                        <td>{{ $categoria->descripcion }}</td>
                        <td>
                            <span class="badge {{ $categoria->productos->count() > 0 ? 'badge-ok' : '' }}">
                                {{ $categoria->productos->count() }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection





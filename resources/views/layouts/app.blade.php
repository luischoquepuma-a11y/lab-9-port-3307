<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'ProductosApp') | DAI</title>
    <style>
        /* ── Variables CSS: paleta verde ── */
        :root {
            --primary:    #2E7D32;
            --primary-dk: #1B5E20;
            --primary-lt: #4CAF50;
            --accent:     #43A047;
            --accent-lt:  #81C784;
            --bg:         #F1F8E9;
            --card-bg:    #FFFFFF;
            --text:       #1B5E20;
            --text-light: #689F63;
            --border:     #C8E6C9;
            --radius:     12px;
            --shadow:     0 4px 20px rgba(27,94,32,.12);
        }

        /* ── Reset y base ── */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
        }
        a { color: var(--primary); text-decoration: none; }
        a:hover { color: var(--primary-dk); text-decoration: underline; }

        /* ── Navbar ── */
        .navbar {
            background: linear-gradient(135deg, var(--primary-dk), var(--primary));
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 3px 12px rgba(27,94,32,.25);
        }
        .navbar .brand {
            color: #fff; font-size: 1.35rem; font-weight: 700;
            letter-spacing: .5px;
        }
        .navbar .brand span { color: var(--accent-lt); }
        .navbar nav { display: flex; align-items: center; gap: .25rem; }
        .navbar nav a {
            color: rgba(255,255,255,.85);
            padding: .45rem 1rem;
            border-radius: 8px;
            font-size: .95rem;
            font-weight: 500;
            transition: background .2s, color .2s;
        }
        .navbar nav a:hover {
            background: rgba(255,255,255,.15);
            color: #fff; text-decoration: none;
        }
        .navbar .carrito-btn {
            background: var(--primary-lt); color: #fff; border: none;
            padding: .55rem 1.2rem; border-radius: 24px; cursor: pointer;
            font-size: .9rem; font-weight: 700; transition: background .2s, transform .15s;
            margin-left: .5rem;
        }
        .navbar .carrito-btn:hover {
            background: var(--accent-lt); color: var(--primary-dk);
            transform: scale(1.05);
        }

        /* ── Contenido principal ── */
        .main-content { max-width: 1260px; margin: 2.5rem auto; padding: 0 1.5rem; }

        /* ── Tarjetas ── */
        .card {
            background: var(--card-bg); border-radius: var(--radius);
            box-shadow: var(--shadow); padding: 1.75rem;
            margin-bottom: 1.5rem;
            border: 1px solid var(--border);
        }

        /* ── Botones ── */
        .btn {
            display: inline-flex; align-items: center; gap: .4rem;
            padding: .7rem 1.6rem; border-radius: 8px;
            font-weight: 600; font-size: .95rem;
            cursor: pointer; border: none; transition: all .25s;
            line-height: 1.3;
        }
        .btn:hover { transform: translateY(-2px); box-shadow: 0 4px 12px rgba(0,0,0,.15); }
        .btn:active { transform: translateY(0); }
        .btn-primary { background: var(--primary); color: #fff; }
        .btn-primary:hover { background: var(--primary-dk); color: #fff; text-decoration: none; }
        .btn-success { background: #388E3C; color: #fff; }
        .btn-success:hover { background: #2E7D32; color: #fff; text-decoration: none; }
        .btn-danger  { background: #C62828; color: #fff; }
        .btn-danger:hover { background: #B71C1C; color: #fff; text-decoration: none; }
        .btn-outline {
            background: transparent; border: 2px solid var(--primary);
            color: var(--primary);
        }
        .btn-outline:hover { background: var(--primary); color: #fff; text-decoration: none; }
        .btn-sm { padding: .45rem 1rem; font-size: .85rem; }
        .btn-lg { padding: .9rem 2rem; font-size: 1.05rem; }

        /* ── Galeria de productos ── */
        .galeria-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 1.5rem;
            margin-top: 1.5rem;
        }
        .producto-card {
            background: var(--card-bg); border-radius: var(--radius);
            box-shadow: var(--shadow); overflow: hidden;
            transition: transform .3s, box-shadow .3s;
            display: flex; flex-direction: column;
            border: 1px solid var(--border);
        }
        .producto-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 14px 32px rgba(27,94,32,.18);
        }
        .producto-card img {
            width: 100%; height: 210px; object-fit: cover;
        }
        .producto-card .no-foto {
            width:100%; height:210px; background: #E8F5E9;
            display:flex; align-items:center; justify-content:center;
            color: var(--text-light); font-size:.9rem;
        }
        .producto-card .card-body {
            padding: 1.1rem; flex-grow:1; display:flex; flex-direction:column;
        }
        .producto-card .card-body h3 { font-size: 1.05rem; margin-bottom: .25rem; color: var(--primary-dk); }
        .producto-card .card-body .marca { color: var(--text-light); font-size: .85rem; margin-bottom: .6rem; }
        .producto-card .card-body .precio {
            font-size: 1.3rem; font-weight: 700; color: var(--primary); margin-top: auto;
        }
        .producto-card .card-footer {
            padding: .8rem 1.1rem; border-top: 1px solid var(--border);
            display: flex; gap: .5rem; justify-content: space-between; align-items: center;
        }
        .badge-categoria {
            background: #E8F5E9; color: var(--primary-dk);
            padding: .3rem .75rem; border-radius: 20px;
            font-size: .78rem; font-weight: 600;
        }
        .badge-stock-ok   { background: #C8E6C9; color: #1B5E20; }
        .badge-stock-warn { background: #FFF3E0; color: #E65100; }
        .badge-stock-low  { background: #FFCDD2; color: #B71C1C; }

        /* ── Badge simple (tablas) ── */
        .badge {
            display: inline-block; padding: .2rem .65rem;
            border-radius: 16px; font-size: .82rem; font-weight: 600;
            background: #E8F5E9; color: var(--primary-dk);
        }
        .badge-ok   { background: #C8E6C9; color: #1B5E20; }
        .badge-warn { background: #FFCDD2; color: #B71C1C; }

        /* ── Tablas ── */
        table { width: 100%; border-collapse: collapse; margin-top: 1rem; }
        th {
            background: var(--primary-dk); color: #fff;
            padding: .8rem 1rem; text-align: left; font-size: .9rem;
        }
        td {
            padding: .7rem 1rem; border-bottom: 1px solid var(--border);
            font-size: .92rem;
        }
        tr:hover td { background: #F1F8E9; }

        /* ── Alertas ── */
        .alert { padding: 1rem 1.3rem; border-radius: var(--radius); margin-bottom: 1rem; font-size: .95rem; }
        .alert-success { background: #E8F5E9; border-left: 5px solid #388E3C; color: #1B5E20; }
        .alert-danger  { background: #FFEBEE; border-left: 5px solid #C62828; color: #B71C1C; }
        .alert-info    { background: #E3F2FD; border-left: 5px solid #1565C0; color: #0D47A1; }

        /* ── Formularios ── */
        .form-group { margin-bottom: 1.3rem; }
        .form-group label { display: block; font-weight: 600; margin-bottom: .4rem; font-size: .92rem; }
        .form-group input, .form-group select, .form-group textarea {
            width: 100%; padding: .7rem 1rem;
            border: 1.5px solid var(--border); border-radius: 8px;
            font-size: .95rem; transition: border-color .2s, box-shadow .2s;
        }
        .form-group input:focus, .form-group select:focus, .form-group textarea:focus {
            outline: none; border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(46,125,50,.15);
        }
        .form-error { color: #C62828; font-size: .83rem; margin-top: .3rem; }

        /* ── Footer ── */
        .site-footer {
            text-align: center; padding: 1.5rem; margin-top: 3rem;
            color: var(--text-light); font-size: .85rem;
            border-top: 1px solid var(--border);
        }
    </style>
    @stack('styles')
</head>
<body>
 
<!-- Navbar -->
<div class="navbar">
    <a href="{{ route('home') }}" class="brand">Productos<span>App</span></a>
    <nav>
        @auth
            <a href="{{ route('productos.galeria') }}">Galeria</a>
            <a href="{{ route('productos.index') }}">Productos</a>
            <a href="{{ route('categorias.index') }}">Categorias</a>
            <a href="{{ route('carrito.index') }}" class="carrito-btn">
                Carrito
                @if(session('carrito') && count(session('carrito')) > 0)
                    ({{ count(session('carrito')) }})
                @endif
            </a>
            <form action="{{ route('logout') }}" method="POST" style="display:inline">
                @csrf
                <button type="submit" class="btn btn-outline" style="margin-left:1rem">
                    Cerrar sesion
                </button>
            </form>
        @else
            <a href="{{ route('login') }}">Iniciar sesion</a>
        @endauth
    </nav>
</div>
 
<!-- Contenido principal -->
<div class="main-content">
 
    {{-- Mensajes flash de sesion --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    @if(session('info'))
        <div class="alert alert-info">{{ session('info') }}</div>
    @endif
 
    @yield('contenido')
</div>
 
<div class="site-footer">
    Desarrollo de Aplicaciones en Internet &mdash; Ciclo III &mdash; {{ date('Y') }}
</div>
 
@stack('scripts')
</body>
</html>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'ProductosApp') | DAI</title>
    <style>
        /* ── Variables CSS: paleta verde expandida ── */
        :root {
            --green-50:   #E8F5E9;
            --green-100:  #C8E6C9;
            --green-200:  #A5D6A7;
            --green-300:  #81C784;
            --green-400:  #66BB6A;
            --green-500:  #4CAF50;
            --green-600:  #43A047;
            --green-700:  #388E3C;
            --green-800:  #2E7D32;
            --green-900:  #1B5E20;
            --green-950:  #0D3D14;

            --emerald-300:#6EE7B7;
            --emerald-500:#10B981;
            --emerald-700:#047857;

            --lime-200:   #D9F99D;
            --lime-400:   #A3E635;
            --lime-600:   #65A30D;

            --primary:    var(--green-800);
            --primary-dk: var(--green-900);
            --primary-lt: var(--green-500);
            --accent:     var(--green-600);
            --accent-lt:  var(--green-300);
            --bg:         linear-gradient(135deg, #F1F8E9 0%, #E8F5E9 50%, #F0FDF4 100%);
            --card-bg:    rgba(255,255,255,.92);
            --text:       var(--green-900);
            --text-light: var(--green-600);
            --border:     var(--green-100);
            --radius-sm:  10px;
            --radius-md:  16px;
            --radius-lg:  24px;
            --radius-xl:  32px;
            --shadow:     0 8px 28px rgba(13,61,20,.1);
            --shadow-lg:  0 16px 48px rgba(13,61,20,.14);
        }

        /* ── Reset y base ── */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: var(--bg);
            background-attachment: fixed;
            color: var(--text);
            min-height: 100vh;
            line-height: 1.6;
        }
        ::selection { background: var(--green-200); color: var(--green-950); }
        a { color: var(--green-700); text-decoration: none; font-weight: 500; }
        a:hover { color: var(--green-900); text-decoration: underline; }

        /* ── Navbar ── */
        .navbar {
            background: linear-gradient(135deg, var(--green-950), var(--green-800), var(--green-700));
            padding: 1.2rem 2.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 20px rgba(13,61,20,.3);
            position: sticky;
            top: 0;
            z-index: 100;
            backdrop-filter: blur(6px);
        }
        .navbar .brand {
            color: #fff; font-size: 1.5rem; font-weight: 800;
            letter-spacing: .8px;
            text-shadow: 0 2px 4px rgba(0,0,0,.15);
        }
        .navbar .brand span { color: var(--lime-400); }
        .navbar nav { display: flex; align-items: center; gap: .35rem; }
        .navbar nav a {
            color: rgba(255,255,255,.88);
            padding: .55rem 1.2rem;
            border-radius: var(--radius-sm);
            font-size: .95rem;
            font-weight: 500;
            transition: background .25s, color .2s, transform .15s;
        }
        .navbar nav a:hover {
            background: rgba(255,255,255,.14);
            color: var(--lime-200); text-decoration: none;
            transform: translateY(-1px);
        }
        .navbar .carrito-btn {
            background: linear-gradient(135deg, var(--lime-400), var(--green-500));
            color: var(--green-950); border: none;
            padding: .6rem 1.4rem; border-radius: 100px; cursor: pointer;
            font-size: .9rem; font-weight: 700; transition: all .25s;
            margin-left: .5rem;
            box-shadow: 0 2px 8px rgba(163,230,53,.2);
        }
        .navbar .carrito-btn:hover {
            background: linear-gradient(135deg, var(--lime-200), var(--lime-400));
            color: var(--green-950);
            transform: scale(1.06) translateY(-1px);
            box-shadow: 0 4px 16px rgba(163,230,53,.3);
        }

        /* ── Contenido principal ── */
        .main-content {
            max-width: 1320px;
            margin: 3rem auto;
            padding: 0 2rem;
        }

        /* ── Tarjetas ── */
        .card {
            background: var(--card-bg);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow);
            padding: 2rem 2.25rem;
            margin-bottom: 2rem;
            border: 1px solid var(--border);
            backdrop-filter: blur(4px);
            transition: box-shadow .3s;
        }
        .card:hover {
            box-shadow: var(--shadow-lg);
        }

        /* ── Botones ── */
        .btn {
            display: inline-flex; align-items: center; gap: .5rem;
            padding: .8rem 1.8rem; border-radius: var(--radius-sm);
            font-weight: 600; font-size: .95rem;
            cursor: pointer; border: none; transition: all .25s;
            line-height: 1.4;
        }
        .btn:hover { transform: translateY(-3px); box-shadow: 0 6px 18px rgba(0,0,0,.12); }
        .btn:active { transform: translateY(-1px); }
        .btn-primary {
            background: linear-gradient(135deg, var(--green-700), var(--green-800));
            color: #fff;
        }
        .btn-primary:hover { background: linear-gradient(135deg, var(--green-800), var(--green-900)); color: #fff; text-decoration: none; }
        .btn-success {
            background: linear-gradient(135deg, var(--emerald-500), var(--green-700));
            color: #fff;
        }
        .btn-success:hover { background: linear-gradient(135deg, var(--green-700), var(--green-900)); color: #fff; text-decoration: none; }
        .btn-danger  { background: linear-gradient(135deg, #EF4444, #DC2626); color: #fff; }
        .btn-danger:hover { background: linear-gradient(135deg, #DC2626, #B91C1C); color: #fff; text-decoration: none; }
        .btn-outline {
            background: transparent; border: 2px solid var(--green-700);
            color: var(--green-700);
        }
        .btn-outline:hover { background: var(--green-700); color: #fff; text-decoration: none; }
        .btn-sm { padding: .5rem 1.1rem; font-size: .85rem; border-radius: 8px; }
        .btn-lg { padding: 1rem 2.2rem; font-size: 1.05rem; border-radius: var(--radius-md); }

        /* ── Galeria de productos ── */
        .galeria-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }
        .producto-card {
            background: var(--card-bg);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow);
            overflow: hidden;
            transition: transform .35s, box-shadow .35s;
            display: flex; flex-direction: column;
            border: 1px solid var(--border);
            backdrop-filter: blur(4px);
        }
        .producto-card:hover {
            transform: translateY(-10px) scale(1.01);
            box-shadow: var(--shadow-lg);
        }
        .producto-card img {
            width: 100%; height: 230px; object-fit: cover;
        }
        .producto-card .no-foto {
            width:100%; height:230px;
            background: linear-gradient(135deg, var(--green-100), var(--green-50));
            display:flex; align-items:center; justify-content:center;
            color: var(--text-light); font-size:.95rem; font-weight: 500;
        }
        .producto-card .card-body {
            padding: 1.3rem 1.4rem; flex-grow:1; display:flex; flex-direction:column;
        }
        .producto-card .card-body h3 { font-size: 1.15rem; margin-bottom: .3rem; color: var(--green-900); font-weight: 700; }
        .producto-card .card-body .marca { color: var(--text-light); font-size: .88rem; margin-bottom: .7rem; }
        .producto-card .card-body .precio {
            font-size: 1.45rem; font-weight: 800; color: var(--green-700); margin-top: auto;
            text-shadow: 0 1px 2px rgba(46,125,50,.08);
        }
        .producto-card .card-footer {
            padding: .9rem 1.4rem; border-top: 1px solid var(--border);
            display: flex; gap: .6rem; justify-content: space-between; align-items: center;
            background: rgba(232,245,233,.3);
        }
        .badge-categoria {
            background: linear-gradient(135deg, var(--green-100), var(--green-200));
            color: var(--green-900);
            padding: .35rem .85rem; border-radius: 100px;
            font-size: .8rem; font-weight: 700;
        }
        .badge-stock-ok   { background: linear-gradient(135deg, #BBF7D0, #86EFAC); color: #14532D; }
        .badge-stock-warn { background: linear-gradient(135deg, #FEF3C7, #FDE68A); color: #92400E; }
        .badge-stock-low  { background: linear-gradient(135deg, #FECACA, #FCA5A5); color: #991B1B; }

        /* ── Badge simple (tablas) ── */
        .badge {
            display: inline-block; padding: .25rem .75rem;
            border-radius: 100px; font-size: .82rem; font-weight: 700;
            background: var(--green-100); color: var(--green-900);
        }
        .badge-ok   { background: #BBF7D0; color: #14532D; }
        .badge-warn { background: #FECACA; color: #991B1B; }

        /* ── Tablas ── */
        table { width: 100%; border-collapse: separate; border-spacing: 0; margin-top: 1rem; }
        th {
            background: var(--green-800);
            color: #fff;
            padding: .9rem 1.2rem; text-align: left; font-size: .9rem; font-weight: 600;
        }
        th:first-child { border-radius: var(--radius-md) 0 0 0; }
        th:last-child  { border-radius: 0 var(--radius-md) 0 0; }
        td {
            padding: .8rem 1.2rem; border-bottom: 1px solid var(--border);
            font-size: .93rem;
        }
        tr:last-child td:first-child { border-radius: 0 0 0 var(--radius-md); }
        tr:last-child td:last-child  { border-radius: 0 0 var(--radius-md) 0; }
        tr:hover td { background: rgba(232,245,233,.6); }

        /* ── Alertas ── */
        .alert {
            padding: 1.1rem 1.5rem;
            border-radius: var(--radius-md);
            margin-bottom: 1.5rem;
            font-size: .95rem;
        }
        .alert-success { background: linear-gradient(135deg, #DCFCE7, #BBF7D0); border-left: 5px solid var(--green-700); color: #14532D; }
        .alert-danger  { background: linear-gradient(135deg, #FEE2E2, #FECACA); border-left: 5px solid #DC2626; color: #991B1B; }
        .alert-info    { background: linear-gradient(135deg, #DBEAFE, #BFDBFE); border-left: 5px solid #2563EB; color: #1E3A5F; }

        /* ── Formularios ── */
        .form-group { margin-bottom: 1.5rem; }
        .form-group label { display: block; font-weight: 700; margin-bottom: .5rem; font-size: .92rem; color: var(--green-800); }
        .form-group input, .form-group select, .form-group textarea {
            width: 100%; padding: .8rem 1.2rem;
            border: 1.5px solid var(--border); border-radius: var(--radius-sm);
            font-size: .95rem; transition: border-color .2s, box-shadow .25s;
            background: #fff;
        }
        .form-group input:focus, .form-group select:focus, .form-group textarea:focus {
            outline: none; border-color: var(--green-600);
            box-shadow: 0 0 0 4px rgba(76,175,80,.12);
        }
        .form-error { color: #DC2626; font-size: .84rem; margin-top: .35rem; }

        /* ── Footer ── */
        .site-footer {
            text-align: center; padding: 2rem; margin-top: 4rem;
            color: var(--text-light); font-size: .87rem;
            background: linear-gradient(135deg, var(--green-800), var(--green-900));
            color: rgba(255,255,255,.7);
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


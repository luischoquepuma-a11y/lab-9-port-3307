<!-- resources/views/auth/login.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión – Productos App</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(135deg, #1B5E20 0%, #2E7D32 40%, #388E3C 100%);
            min-height: 100vh; display: flex; align-items: center; justify-content: center;
        }
        .login-box {
            background: white; border-radius: 14px; padding: 44px 40px;
            width: 400px; box-shadow: 0 12px 40px rgba(27,94,32,.3);
            border: 1px solid rgba(200,230,201,.5);
        }
        .login-box h1 {
            color: #2E7D32; font-size: 1.6rem; text-align: center; margin-bottom: 4px;
        }
        .login-box .subtitle {
            color: #689F63; font-size: 0.9rem; text-align: center; margin-bottom: 28px;
        }
        .form-group { margin-bottom: 20px; }
        label {
            display: block; font-size: 0.85rem; color: #2E7D32;
            margin-bottom: 6px; font-weight: 700;
        }
        input[type=email], input[type=password] {
            width: 100%; padding: 11px 14px; border: 1.5px solid #C8E6C9;
            border-radius: 8px; font-size: 0.95rem; transition: border-color 0.2s, box-shadow 0.2s;
        }
        input:focus {
            outline: none; border-color: #2E7D32;
            box-shadow: 0 0 0 3px rgba(46,125,50,.15);
        }
        .input-error { border-color: #C62828 !important; }
        .input-error:focus { box-shadow: 0 0 0 3px rgba(198,40,40,.15) !important; }
        .error-msg { color: #C62828; font-size: 0.8rem; margin-top: 4px; }
        .alert { padding: 12px 14px; border-radius: 8px; margin-bottom: 18px; font-size: 0.9rem; }
        .alert-danger { background: #FFEBEE; color: #B71C1C; border: 1px solid #EF9A9A; }
        .alert-success { background: #E8F5E9; color: #1B5E20; border: 1px solid #A5D6A7; }
        .alert-info { background: #E3F2FD; color: #0D47A1; border: 1px solid #90CAF9; }
        .btn-login {
            width: 100%; background: #2E7D32; color: white; border: none;
            padding: 14px; border-radius: 8px; font-size: 1.05rem;
            cursor: pointer; font-weight: 700; margin-top: 8px;
            transition: background .25s, transform .2s;
        }
        .btn-login:hover { background: #1B5E20; transform: translateY(-2px); }
        .btn-login:active { transform: translateY(0); }
        .hint {
            background: #F1F8E9; border-radius: 8px; padding: 14px; margin-top: 24px;
            font-size: 0.82rem; color: #558B2F; border-left: 4px solid #2E7D32;
        }
        .hint strong { color: #1B5E20; }
    </style>
</head>
<body>
    <div class="login-box">
        <h1>🛒 Productos App</h1>
        <p class="subtitle">Ingrese sus credenciales para continuar</p>
 
        {{-- Mensajes de sesión (éxito, info) --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('info'))
            <div class="alert alert-info">{{ session('info') }}</div>
        @endif
 
        {{-- Error general de credenciales --}}
        @if($errors->has('email') && !$errors->has('password'))
            <div class="alert alert-danger">{{ $errors->first('email') }}</div>
        @endif
 
        <form method="POST" action="{{ route('login.post') }}">
            @csrf
 
            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input type="email" id="email" name="email"
                       value="{{ old('email') }}"
                       class="{{ $errors->has('email') ? 'input-error' : '' }}"
                       placeholder="ejemplo@correo.com">
                @error('email')
                    <span class="error-msg">{{ $message }}</span>
                @enderror
            </div>
 
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password"
                       class="{{ $errors->has('password') ? 'input-error' : '' }}"
                       placeholder="••••••••">
                @error('password')
                    <span class="error-msg">{{ $message }}</span>
                @enderror
            </div>
 
            <button type="submit" class="btn-login">Iniciar Sesión</button>
        </form>
 
        <div class="hint">
            <strong>Credenciales de prueba:</strong><br>
            Admin: admin@productosapp.com / admin123<br>
            Demo:  demo@productosapp.com  / demo123
        </div>
    </div>
</body>
</html>


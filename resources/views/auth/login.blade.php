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
            background: linear-gradient(135deg, #0D3D14 0%, #1B5E20 35%, #2E7D32 65%, #388E3C 100%);
            min-height: 100vh; display: flex; align-items: center; justify-content: center;
            padding: 1rem;
        }
        .login-box {
            background: rgba(255,255,255,.96);
            border-radius: 20px; padding: 50px 44px;
            width: 420px;
            box-shadow: 0 16px 48px rgba(13,61,20,.35);
            border: 1px solid rgba(165,214,167,.4);
            backdrop-filter: blur(8px);
        }
        .login-box h1 {
            color: #1B5E20; font-size: 1.7rem; text-align: center; margin-bottom: 4px;
            letter-spacing: .5px;
        }
        .login-box .subtitle {
            color: #689F63; font-size: 0.92rem; text-align: center; margin-bottom: 32px;
        }
        .form-group { margin-bottom: 22px; }
        label {
            display: block; font-size: 0.85rem; color: #1B5E20;
            margin-bottom: 6px; font-weight: 700;
        }
        input[type=email], input[type=password] {
            width: 100%; padding: 12px 16px; border: 1.5px solid #A5D6A7;
            border-radius: 10px; font-size: 0.95rem;
            transition: border-color 0.2s, box-shadow 0.25s;
            background: #FAFFFA;
        }
        input:focus {
            outline: none; border-color: #43A047;
            box-shadow: 0 0 0 4px rgba(67,160,71,.12);
        }
        .input-error { border-color: #E53935 !important; }
        .input-error:focus { box-shadow: 0 0 0 4px rgba(229,57,53,.12) !important; }
        .error-msg { color: #E53935; font-size: 0.82rem; margin-top: 4px; font-weight: 500; }
        .alert { padding: 14px 16px; border-radius: 12px; margin-bottom: 20px; font-size: 0.9rem; }
        .alert-danger { background: #FEE2E2; color: #991B1B; border: 1px solid #FCA5A5; }
        .alert-success { background: #DCFCE7; color: #14532D; border: 1px solid #86EFAC; }
        .alert-info { background: #DBEAFE; color: #1E3A5F; border: 1px solid #93C5FD; }
        .btn-login {
            width: 100%;
            background: linear-gradient(135deg, #2E7D32, #388E3C);
            color: white; border: none;
            padding: 15px; border-radius: 12px; font-size: 1.05rem;
            cursor: pointer; font-weight: 700; margin-top: 10px;
            transition: all .25s;
            letter-spacing: .5px;
        }
        .btn-login:hover { background: linear-gradient(135deg, #1B5E20, #2E7D32); transform: translateY(-3px); box-shadow: 0 6px 20px rgba(27,94,32,.25); }
        .btn-login:active { transform: translateY(-1px); }
        .hint {
            background: linear-gradient(135deg, #F1F8E9, #E8F5E9);
            border-radius: 12px; padding: 16px; margin-top: 28px;
            font-size: 0.84rem; color: #2E7D32;
            border-left: 4px solid #388E3C;
            line-height: 1.6;
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


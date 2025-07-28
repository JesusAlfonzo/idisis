@php
    $loginUrl = View::getSection('login_url') ?? config('adminlte.login_url', 'login');
    $registerUrl = View::getSection('register_url') ?? config('adminlte.register_url', 'register');
    $passResetUrl = View::getSection('password_reset_url') ?? config('adminlte.password_reset_url', 'password/reset');

    if (config('adminlte.use_route_url', false)) {
        $loginUrl = $loginUrl ? route($loginUrl) : '';
        $registerUrl = $registerUrl ? route($registerUrl) : '';
        $passResetUrl = $passResetUrl ? route($passResetUrl) : '';
    } else {
        $loginUrl = $loginUrl ? url($loginUrl) : '';
        $registerUrl = $registerUrl ? url($registerUrl) : '';
        $passResetUrl = $passResetUrl ? url($passResetUrl) : '';
    }
@endphp

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión | IDIsis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background: #f4f6f9; }
        .btn-lg { min-width: 160px; }
        .card { border-radius: 1rem; }
        .form-control:focus { box-shadow: 0 0 0 0.2rem #007bff33; }
        .input-group-text { background: #fff; }
        .form-label {
            font-weight: 600;
            color: #495057;
            letter-spacing: 0.5px;
        }
        .form-control {
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
            font-size: 1.05rem;
        }
        .input-group {
            margin-bottom: 1.5rem !important;
        }
        .card h2 {
            font-size: 2rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 2rem !important;
        }
        .card .d-flex a, .card .text-center a {
            color: #007bff;
            font-weight: 500;
            text-decoration: none;
        }
        .card .d-flex a:hover, .card .text-center a:hover {
            text-decoration: underline;
        }
        .btn-primary {
            font-size: 1.1rem;
            font-weight: 600;
            padding: 0.75rem 0;
            letter-spacing: 0.5px;
        }
        .card {
            box-shadow: 0 4px 24px 0 rgba(44,62,80,0.08);
        }
    </style>
</head>
<body>
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="card shadow p-4" style="max-width: 400px; width: 100%;">
            <div class="text-center mb-4">
                <img src="/vendor/adminlte/dist/img/AdminLTELogo.png" alt="Logo" style="width: 100px;">
            </div>
            <h2 class="text-center">¡Bienvenido de nuevo a <span style="color:#007bff">IDIsis</span>!</h2>
            <form action="{{ $loginUrl }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Correo electrónico" autofocus required>
                        @error('email')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">Contraseña</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-lock"></i></span>
                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Contraseña" required>
                        @error('password')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">Recuérdame</label>
                </div>
                <div class="d-grid gap-2 mb-3">
                    <button type="submit" class="btn btn-primary btn-lg">Iniciar sesión</button>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    @if($passResetUrl)
                        <a href="{{ $passResetUrl }}">¿Olvidaste tu contraseña?</a>
                    @endif
                    @if($registerUrl)
                        <a href="{{ $registerUrl }}"><b>Registrarse</b></a>
                    @endif
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

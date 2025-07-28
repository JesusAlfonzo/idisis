@php
    $loginUrl = View::getSection('login_url') ?? config('adminlte.login_url', 'login');
    $registerUrl = View::getSection('register_url') ?? config('adminlte.register_url', 'register');

    if (config('adminlte.use_route_url', false)) {
        $loginUrl = $loginUrl ? route($loginUrl) : '';
        $registerUrl = $registerUrl ? route($registerUrl) : '';
    } else {
        $loginUrl = $loginUrl ? url($loginUrl) : '';
        $registerUrl = $registerUrl ? url($registerUrl) : '';
    }
@endphp

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse | IDIsis</title>
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
        .card .text-center a {
            color: #007bff;
            font-weight: 500;
            text-decoration: none;
        }
        .card .text-center a:hover {
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
            <h2 class="text-center">¡Crea tu cuenta en <span style="color:#007bff">IDIsis</span>!</h2>
            <form action="{{ $registerUrl }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="name" class="form-label">Nombre completo</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Nombre completo" autofocus required>
                        @error('name')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="mb-4">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Correo electrónico" required>
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
                <div class="mb-4">
                    <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-lock"></i></span>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirmar contraseña" required>
                        @error('password_confirmation')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="d-grid gap-2 mb-3">
                    <button type="submit" class="btn btn-primary btn-lg">Registrarse</button>
                </div>
                <div class="text-center mt-2">
                    <a href="{{ $loginUrl }}">¿Ya tienes una cuenta? <b>Inicia sesión</b></a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

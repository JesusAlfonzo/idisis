<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a IDIsis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f4f6f9; }
        .btn-lg { min-width: 160px; }
    </style>
</head>
<body>
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="card shadow p-4" style="max-width: 400px; width: 100%;">
            <div class="text-center mb-4">
                <img src="/vendor/adminlte/dist/img/AdminLTELogo.png" alt="Logo" style="width: 100px;">
            </div>
            <h1 class="mb-3 text-center">¡Bienvenido a IDIsis!</h1>
            <p class="lead mb-4 text-center">Gestiona tu cuenta y accede a todas las funcionalidades del sistema desde aquí.</p>
            <div class="d-grid gap-2">
                <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Iniciar sesión</a>
                <a href="{{ route('register') }}" class="btn btn-outline-secondary btn-lg">Registrarse</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

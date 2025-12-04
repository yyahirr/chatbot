<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Login</title>
    <!-- Enlace al CSS específico de login -->
    <link rel="stylesheet" href="../../css/diseñoLogin.css" />
</head>
<body>
    <main class="login-wrapper" role="main" aria-labelledby="login-title">
        <h1 id="login-title" class="login-title">Ingresar a Gastón</h1>

        <form class="login-form" action="../../controller/usuario.controller.php" method="POST" autocomplete="on">
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" placeholder="tu@ejemplo.com" required />
            </div>

            <div class="form-group">
                <label for="contrasena">Contraseña</label>
                <input id="contrasena" type="password" name="contrasena" placeholder="Contraseña" required />
            </div>

            <div class="login-actions">
                <button type="submit" class="btn btn-primary">Ingresar</button>
            </div>
        </form>

        <div class="login-actions">
            <a href="../../index.php" class="btn btn-success">Ingresar como invitado</a>
        </div>
    </main>
</body>
</html>

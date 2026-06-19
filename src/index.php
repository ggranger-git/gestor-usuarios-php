<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Acceso al Sistema</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="max-container">
        <div class="form-card">
            <h2 style="text-align: center;">Acceso al Sistema</h2>
            <form action="auth.php" method="POST">
                <div class="form-group">
                    <label>Usuario</label>
                    <input type="text" name="usuario" required style="width: 100%; padding: 8px; margin-top: 5px;">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" required style="width: 100%; padding: 8px; margin-top: 5px;">
                </div>
                <button type="submit" class="btn-submit">Entrar</button>
            </form>
        </div>
    </div>
</body>
</html>
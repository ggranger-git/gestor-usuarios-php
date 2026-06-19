<?php
require_once 'connection_db.php';
session_start(); // Iniciamos sesión

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['usuario']);
    $password = $_POST['password'];

    // Consultamos el usuario y su rol
    $sql = "SELECT id, rol FROM usuarios WHERE usuario = ? AND password = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$usuario, $password]);
    $user = $stmt->fetch();

    if ($user) {
        // Guardamos los datos en la sesión
        $_SESSION['usuario'] = $usuario;
        $_SESSION['rol'] = $user['rol'];
        
        header("Location: dashboard.php"); // Redirigimos a una página de control
        exit;
    } else {
        echo '<!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <title>Error</title>
            <link rel="stylesheet" href="style.css">
        </head>
        <body>
            <div class="max-container" style="margin-top: 50px;">
                <div class="alert-error">Credenciales incorrectas</div>
                <div style="text-align: center;">
                    <a href="index.php" class="btn-action btn-edit">Volver al login</a>
                </div>
            </div>
        </body>
        </html>';
    }
}
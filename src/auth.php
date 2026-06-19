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
        echo "<h1>Credenciales incorrectas</h1>";
        echo '<a href="index.php">Volver al login</a>';
    }
}
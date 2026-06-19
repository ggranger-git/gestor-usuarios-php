<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'admin') {
    die("Acceso denegado.");
}
require_once 'connection_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO clientes (nombre, email, telefono) VALUES (?, ?, ?)");
    $stmt->execute([$_POST['nombre'], $_POST['email'], $_POST['telefono']]);
    header("Location: dashboard.php");
}
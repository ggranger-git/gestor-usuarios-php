<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'admin') {
    die("Acceso denegado.");
}
require_once 'connection_db.php';

if (isset($_GET['id'])) {
    $stmt = $pdo->prepare("DELETE FROM clientes WHERE id = ?");
    $stmt->execute([$_GET['id']]);
}
header("Location: dashboard.php");
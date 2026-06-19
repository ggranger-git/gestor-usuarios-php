<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'admin') { die("Acceso denegado."); }
require_once 'connection_db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("UPDATE clientes SET nombre=?, email=?, telefono=? WHERE id=?");
    $stmt->execute([$_POST['nombre'], $_POST['email'], $_POST['telefono'], $_POST['id']]);
    header("Location: dashboard.php"); exit;
}
$c = $pdo->prepare("SELECT * FROM clientes WHERE id = ?");
$c->execute([$_GET['id']]);
$cliente = $c->fetch();
?>
<!DOCTYPE html>
<html lang="es">
<head><link rel="stylesheet" href="style.css"></head>
<body>
    <div class="max-container">
        <div class="form-card">
            <h2>Editar Cliente</h2>
            <form method="POST" style="margin-top: 20px;">
                <input type="hidden" name="id" value="<?= $cliente['id'] ?>">
                <div class="form-group"><input type="text" name="nombre" value="<?= htmlspecialchars($cliente['nombre']) ?>" required></div>
                <div class="form-group"><input type="email" name="email" value="<?= htmlspecialchars($cliente['email']) ?>" required></div>
                <div class="form-group"><input type="text" name="telefono" value="<?= htmlspecialchars($cliente['telefono'] ?? '') ?>"></div>
                <div style="display: flex; gap: 10px; margin-top: 20px;">
                    <button type="submit" class="btn-submit" style="flex: 2;">Actualizar</button>
                    <a href="dashboard.php" class="btn-action btn-delete" style="flex: 1; text-align: center; padding: 12px; text-decoration: none;">Volver</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
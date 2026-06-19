<?php
session_start();
require_once 'connection_db.php';
if (!isset($_SESSION['usuario'])) { header("Location: index.php"); exit; }
$clientes = $pdo->query("SELECT * FROM clientes ORDER BY id DESC")->fetchAll();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="max-container" style="text-align: center;">
        <h1>Bienvenido, <?= htmlspecialchars($_SESSION['usuario']) ?></h1>
        <p>Rol: <strong><?= $_SESSION['rol'] ?></strong></p>
        <a href="logout.php" class="btn-logout">Cerrar Sesión</a>

        <?php if ($_SESSION['rol'] === 'admin'): ?>
            <div class="form-card">
                <h2>Añadir Nuevo Cliente</h2>
                <form action="insertar.php" method="POST">
                    <div class="form-group"><input type="text" name="nombre" placeholder="Nombre" required></div>
                    <div class="form-group"><input type="email" name="email" placeholder="Email" required></div>
                    <div class="form-group"><input type="text" name="telefono" placeholder="Teléfono"></div>
                    <button type="submit" class="btn-submit">Guardar Cliente</button>
                </form>
            </div>
        <?php endif; ?>

        <div class="table-container" style="text-align: left; margin-top: 20px;">
            <table>
                <thead><tr><th>ID</th><th>Nombre</th><th>Email</th><th>Teléfono</th><th>Acciones</th></tr></thead>
                <tbody>
                    <?php foreach ($clientes as $c): ?>
                        <tr>
                            <td><?= $c['id'] ?></td>
                            <td><?= htmlspecialchars($c['nombre']) ?></td>
                            <td><?= htmlspecialchars($c['email']) ?></td>
                            <td><?= htmlspecialchars($c['telefono'] ?? '-') ?></td>
                            <td>
                                <?php if ($_SESSION['rol'] === 'admin'): ?>
                                    <a href="editar.php?id=<?= $c['id'] ?>" class="btn-action btn-edit">Editar</a>
                                    <a href="eliminar.php?id=<?= $c['id'] ?>" class="btn-action btn-delete">Eliminar</a>
                                <?php else: ?>
                                    <span class="btn-disabled">Editar</span>
                                    <span class="btn-disabled">Eliminar</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
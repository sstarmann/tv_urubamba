<?php
require_once __DIR__ . '/includes/functions.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$cliente = obtenerClientePorId($_GET['id']); 

if (!$cliente) {
    header("Location: index.php?mensaje=Cliente no encontrado");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = sanitizeInput($_POST['nombre']);
    $apellido = sanitizeInput($_POST['apellido']);
    $dni = sanitizeInput($_POST['dni']);
    $direccion = sanitizeInput($_POST['direccion']);

    $result = actualizarCliente($_GET['id'], $nombre, $apellido, $dni, $direccion); 

    if ($result > 0) {
        header("Location: index.php?mensaje=Cliente actualizado con éxito");
    } else {
        $error = "No se pudo actualizar el cliente.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Editar Cliente</h1>

        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="POST">
            <label>Nombre: <input type="text" name="nombre" value="<?php echo htmlspecialchars($cliente['nombre']); ?>" required></label>
            <label>Apellido: <input type="text" name="apellido" value="<?php echo htmlspecialchars($cliente['apellido']); ?>" required></label>
            <label>DNI: <input type="text" name="dni" value="<?php echo htmlspecialchars($cliente['dni']); ?>" required></label>
            <label>Dirección: <textarea name="direccion" required><?php echo htmlspecialchars($cliente['direccion']); ?></textarea></label>
            <input type="submit" value="Actualizar Cliente">
        </form>

        <a href="index.php" class="button">Volver a la lista de clientes</a>
    </div>
</body>
</html>

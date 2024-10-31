<?php
require_once __DIR__ . '/includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = crearCliente($_POST['nombre'], $_POST['apellido'], $_POST['dni'], $_POST['direccion']); 

    if ($id) {
        header("Location: index.php?mensaje=Cliente creado con éxito");
        exit;
    } else {
        $error = "No se pudo registrar al cliente.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nuevo Cliente</title>
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Agregar Nuevo Cliente</h1>

        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="POST">
            <label>Nombre: <input type="text" name="nombre" required></label>
            <label>Apellido: <input type="text" name="apellido" required></label>
            <label>DNI: 
                <input type="text" name="dni" required pattern="\d{8}" title="El DNI debe tener 8 dígitos" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
            </label>
            <label>Dirección: <textarea name="direccion" required></textarea></label>
            <input type="submit" value="Crear Cliente" class="button button-agregar"> <!-- Aquí se agrega la clase -->
        </form>
        
        <a href="index.php" class="button button-volver">Volver a la lista de clientes</a>

    </div>
</body>
</html>

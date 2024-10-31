<?php
require_once __DIR__ . '../includes/functions.php';

$mensaje = ''; 

if (isset($_GET['accion']) && $_GET['accion'] === 'eliminar' && isset($_GET['id'])) {
    $count = eliminarCliente($_GET['id']);
    if ($count > 0) {
        $mensaje = "Cliente eliminado con éxito.";
    } else {
        $mensaje = "No se pudo eliminar al cliente.";
    }
}

$clientes = obtenerClientes();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes Urubamba TV</title>
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body>
<div class="container">
    <h1>Clientes Urubamba TV</h1>

    <?php if (isset($mensaje)): ?>
        <div class="<?php echo $count > 0 ? 'success' : 'error'; ?>">
            <?php echo $mensaje; ?>
        </div>
    <?php endif; ?>


<a href="agregar_cliente.php" class="button button-agregar">Agregar Cliente</a>


<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>DNI</th>
            <th>Dirección</th>
            <th>Acciones</th> 
        </tr>
    </thead>
    <tbody>
        <?php foreach ($clientes as $cliente): ?>
            <tr>
                <td><?php echo $cliente['nombre']; ?></td>
                <td><?php echo $cliente['apellido']; ?></td>
                <td><?php echo $cliente['dni']; ?></td>
                <td><?php echo $cliente['direccion']; ?></td>
                <td class="actions">
                   
                    <a href="editar_cliente.php?id=<?php echo $cliente['_id']; ?>" class="button button-editar">Editar</a>
                    
                    <a href="index.php?accion=eliminar&id=<?php echo $cliente['_id']; ?>" class="button button-eliminar">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</div>
</body>
</html>

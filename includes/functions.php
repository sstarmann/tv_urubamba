<?php
require_once __DIR__ . '/../config/database.php';

function sanitizeInput($input) {
    return htmlspecialchars(strip_tags(trim($input)));
}

function crearCliente($nombre, $apellido, $dni, $direccion) {
    global $clientesCollection;
    $resultado = $clientesCollection->insertOne([
        'nombre' => sanitizeInput($nombre),
        'apellido' => sanitizeInput($apellido),
        'dni' => sanitizeInput($dni),
        'direccion' => sanitizeInput($direccion)
    ]);
    return $resultado->getInsertedId();
}

function obtenerClientes() {
    global $clientesCollection;
    return $clientesCollection->find()->toArray();
}

function obtenerClientePorId($id) {
    global $clientesCollection;
    return $clientesCollection->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
}

function actualizarCliente($id, $nombre, $apellido, $dni, $direccion) {
    global $clientesCollection;
    $resultado = $clientesCollection->updateOne(
        ['_id' => new MongoDB\BSON\ObjectId($id)],
        ['$set' => [
            'nombre' => sanitizeInput($nombre),
            'apellido' => sanitizeInput($apellido),
            'dni' => sanitizeInput($dni),
            'direccion' => sanitizeInput($direccion)
        ]]
    );
    return $resultado->getModifiedCount();
}

function eliminarCliente($id) {
    global $clientesCollection;
    $result = $clientesCollection->deleteOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
    if ($result->getDeletedCount() > 0) {
        error_log("Cliente eliminado: $id"); // Log en el archivo de errores
    } else {
        error_log("No se pudo eliminar el cliente: $id");
    }
    return $result->getDeletedCount();
}

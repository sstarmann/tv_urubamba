<?php

require_once __DIR__ . '/../vendor/autoload.php';

// Configuración de la conexión a MongoDB
$mongoClient = new MongoDB\Client("mongodb+srv://73571574:73571574@cluster1.mnhaq.mongodb.net/?retryWrites=true&w=majority&appName=Cluster1");

try {
    // Verifica la conexión
    $mongoClient->selectDatabase('admin')->command(['ping' => 1]);
    echo "";
} catch (Exception $e) {
    echo "Error de conexión: " . $e->getMessage();
    exit;
}

// Selecciona la base de datos y la colección
$database = $mongoClient->cluster1; // Cambia 'cluster1' por el nombre de tu base de datos si es diferente
$clientesCollection = $database->mi_coleccion; // Cambia 'mi_coleccion' por el nombre de tu colección
?>

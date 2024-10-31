<?php

require_once __DIR__ . '/../vendor/autoload.php';

// Configuración de la conexión a MongoDB
$mongoClient = new MongoDB\Client("mongodb+srv://73571574:73571574@cluster1.mnhaq.mongodb.net/?retryWrites=true&w=majority&appName=Cluster1");

try {
    
    $mongoClient->selectDatabase('admin')->command(['ping' => 1]);
    echo "";
} catch (Exception $e) {
    echo "Error de conexión: " . $e->getMessage();
    exit;
}


$database = $mongoClient->cluster1;
$clientesCollection = $database->mi_coleccion;
?>

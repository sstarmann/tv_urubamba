<?php
// Cargar las dependencias de Composer
require 'vendor/autoload.php'; // Asegúrate de que el archivo autoload.php esté en la carpeta vendor

// Configurar la cadena de conexión (reemplazar los datos)
$mongoClient = new MongoDB\Client("://73571574:73571574@cluster1.mongodb.net/<dbname>?retryWrites=true&w=majority");

// Seleccionar la base de datos
$db = $mongoClient->selectDatabase('mi_base_de_datos');

// Seleccionar la colección
$collection = $db->selectCollection('usuarios');

// Insertar un documento
$insertResult = $collection->insertOne([
    'nombre' => 'Juan',
    'email' => 'juan@example.com'
]);

echo "Documento insertado con ID: " . $insertResult->getInsertedId();
?>


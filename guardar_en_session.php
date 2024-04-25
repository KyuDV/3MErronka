<?php
// Iniciar la sesión si no está iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Recibir los detalles del producto del cliente
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
$precio = isset($_POST['precio']) ? $_POST['precio'] : '';
$modelo = isset($_POST['modelo']) ? $_POST['modelo'] : '';
$imagen = isset($_POST['imagen']) ? $_POST['imagen'] : ''; // Corregir aquí

// Guardar los detalles del producto en la sesión
$_SESSION['productos'][] = array(
    'nombre' => $nombre,
    'precio' => $precio,
    'modelo' => $modelo,
    'imagen' => $imagen
);

echo "Producto agregado a la sesión correctamente.";
?>
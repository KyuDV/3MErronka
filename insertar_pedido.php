<?php
// Establecer la conexión con la base de datos (reemplaza los valores con los tuyos)
$servername = "localhost";
$username = "root";
$password = "1WMG2023";
$database = "3m";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$subTotal = 0;
if(isset($_SESSION['productos']) && !empty($_SESSION['productos'])) {
    foreach ($_SESSION['productos'] as $producto) {
        $subTotal += $producto['precio'];
    }
}
// Obtener la fecha del pedido
$fecha_pedido = date("Y-m-d");

// Definir el precio total (puedes ajustar esto según tus necesidades)
$precio_total = $subTotal; // Reemplaza 100 con el precio total real

// Definir el estado del pedido
$estado_pedido = "En espera"; // Estado inicial del pedido

// Insertar el pedido en la base de datos
$sql = "INSERT INTO bezeroeskaerak (id, fecha, prezioTotala, egoera) 
        VALUES (NULL, '$fecha_pedido', $precio_total, '$estado_pedido')";
// Cerrar la conexión
$conn->close();
?>
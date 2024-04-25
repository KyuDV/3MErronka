<?php
// Establecer la conexión con la base de datos (reemplaza los valores con los tuyos)
$servername = "localhost";
$username = "root";
$password = "1WMG2023";
$database = "3m";
<<<<<<< HEAD

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

=======
 
// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);
 
>>>>>>> ed4f31fdbea0c959202447635e78c284c5419a09
// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
<<<<<<< HEAD

=======
 
>>>>>>> ed4f31fdbea0c959202447635e78c284c5419a09
$subTotal = 0;
if(isset($_SESSION['productos']) && !empty($_SESSION['productos'])) {
    foreach ($_SESSION['productos'] as $producto) {
        $subTotal += $producto['precio'];
    }
}
// Obtener la fecha del pedido
$fecha_pedido = date("Y-m-d");
<<<<<<< HEAD

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
=======
 
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
tiene menú contextual


tienes menú contextual
>>>>>>> ed4f31fdbea0c959202447635e78c284c5419a09

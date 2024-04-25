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

// Obtener los datos del formulario
$first_name = $_POST['firstname'];
$last_name = $_POST['lastname'];
$country = $_POST['country'];
$street_address = $_POST['streetaddress'];
$appartment = $_POST['appartment'];
$town_city = $_POST['towncity'];
$postcode_zip = $_POST['postcodezip'];
$phone = $_POST['phone'];
$email = $_POST['emailaddress'];

// Insertar los datos en la base de datos
$sql = "INSERT INTO bezeroeskaerakdet (id, izena, abizena, estatua, street, zenbakia, town,zip, phone, email) 
        VALUES (NULL, '$first_name', '$last_name', '$country', '$street_address', '$appartment', '$town_city', '$postcode_zip', '$phone', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "Datos del cliente insertados correctamente.";
} else {
    echo "Error al insertar los datos del cliente: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
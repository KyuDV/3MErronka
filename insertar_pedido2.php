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
<<<<<<< HEAD

// Insertar los datos en la base de datos
$sql = "INSERT INTO bezeroeskaerakdet (id, izena, abizena, estatua, street, zenbakia, town,zip, phone, email) 
        VALUES (NULL, '$first_name', '$last_name', '$country', '$street_address', '$appartment', '$town_city', '$postcode_zip', '$phone', '$email')";

=======
 
// Insertar los datos en la base de datos
$sql = "INSERT INTO bezeroeskaerakdet (id, izena, abizena, estatua, street, zenbakia, town,zip, phone, email)
        VALUES (NULL, '$first_name', '$last_name', '$country', '$street_address', '$appartment', '$town_city', '$postcode_zip', '$phone', '$email')";
 
>>>>>>> ed4f31fdbea0c959202447635e78c284c5419a09
if ($conn->query($sql) === TRUE) {
    echo "Datos del cliente insertados correctamente.";
} else {
    echo "Error al insertar los datos del cliente: " . $conn->error;
}
<<<<<<< HEAD

=======
 
>>>>>>> ed4f31fdbea0c959202447635e78c284c5419a09
// Cerrar la conexión
$conn->close();
?>
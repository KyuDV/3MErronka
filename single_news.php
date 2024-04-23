<?php
// Incluir el archivo que contiene la configuración de la base de datos
require_once('header.php');

// Configuración de la conexión a la base de datos
$servername = "localhost"; // Nombre del servidor de la base de datos
$username = "root"; // Nombre de usuario de la base de datos
$password = "1WMG2023"; // Contraseña de la base de datos
$dbname = "refresh"; // Nombre de la base de datos

// Crear la conexión utilizando MySQLi
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si hay errores en la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Obtener el ID de la noticia de la URL
$news_id = $_GET['id'];

// Realizar la consulta SQL para recuperar los detalles de la noticia con ese ID
$sql = "SELECT * FROM berriak WHERE id = $news_id";
$result = $conn->query($sql);

// Verificar si hay resultados de la consulta
if ($result->num_rows > 0) {
    // Mostrar los detalles de la noticia
    $row = $result->fetch_assoc();
    echo '<h2>' . $row["Izenburua"] . '</h2>';
    // Mostrar otros detalles de la noticia
} else {
    echo "No se encontró la noticia.";
}

// Incluir el archivo de pie de página
require_once('footer.php');
?>
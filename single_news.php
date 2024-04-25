<?php
// Incluir el archivo que contiene la configuración de la base de datos
require_once('header.php');
 
// Configuración de la conexión a la base de datos
$servername = "localhost"; // Nombre del servidor de la base de datos
$username = "root"; // Nombre de usuario de la base de datos
$password = "1WMG2023"; // Contraseña de la base de datos
<<<<<<< HEAD
$dbname = "3m"; // Nombre de la base de datos

=======
$dbname = "refresh"; // Nombre de la base de datos
 
>>>>>>> ed4f31fdbea0c959202447635e78c284c5419a09
// Crear la conexión utilizando MySQLi
$conn = new mysqli($servername, $username, $password, $dbname);
 
// Verificar si hay errores en la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}
 
// Obtener el ID de la noticia de la URL
$news_id = $_GET['id'];
 
// Realizar la consulta SQL para recuperar los detalles de la noticia con ese ID
$sql = "SELECT * FROM notiziak WHERE id = $news_id";
$result = $conn->query($sql);
 
// Verificar si hay resultados de la consulta
if ($result->num_rows > 0) {
    // Mostrar los detalles de la noticia
    $row = $result->fetch_assoc();
    ?>
<section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 ftco-animate">
                <p>
                    <img src="images/<?php echo $row['argazkiak']; ?>" alt="Image" class="img-fluid">
                </p>
                <h2 class="mb-3"><?php echo $row['izenburua_en']; ?></h2>
                <p><?php echo $row['notizia_en']; ?></p>
                <button onclick="goBack()" class="btn btn-primary py-2 px-4">Volver</button>

                <script>
                function goBack() {
                    window.history.back();
                }
                </script>
            </div>
        </div>
    </div>
</section>
<?php
} else {
echo "No se encontró la noticia.";
}
 
// Incluir el archivo de pie de página
require_once('footer.php');
?>
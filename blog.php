<<<<<<< HEAD
<?php require_once('header.php') ?>

<section class="hero-wrap hero-wrap-2" style="background-image: url('images/blog.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
=======
<?php
// Incluir el archivo que contiene la configuración de la base de datos
require_once('header.php');
 
// Configuración de la conexión a la base de datos
$servername = "localhost"; // Nombre del servidor de la base de datos
$username = "root"; // Nombre de usuario de la base de datos
$password = "1WMG2023"; // Contraseña de la base de datos
$dbname = "3m"; // Nombre de la base de datos
 
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
>>>>>>> ed4f31fdbea0c959202447635e78c284c5419a09
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
<<<<<<< HEAD

<section class="ftco-section">
    <div class="container">
        <?php
// Conexión a la base de datos (suponiendo que estás utilizando MySQL)
$servername = "localhost:3306";
$username = "root";
$password = "1WMG2023";
$dbname = "3m";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Consulta SQL para recuperar las noticias
$sql = "SELECT * FROM notiziak";
$result = $conn->query($sql);

// Verificar si hay resultados de la consulta
if ($result->num_rows > 0) {
    // Iterar sobre los resultados y generar el HTML para cada noticia
    while($row = $result->fetch_assoc()) {
        echo '<div class="col-lg-6 d-flex align-items-stretch ftco-animate">';
        echo '<div class="blog-entry d-md-flex">';
        echo '<div class="text p-4 bg-light">';
        echo '<div class="meta">';
        echo '<p><span class="fa fa-calendar"></span>' . $row["argitaratzeData"] . '</p>';
        echo '</div>';
        echo '<h3 class="heading mb-3"><a href="single_news.php?id=' . $row["id"] . '">' . $row["izenburua_en"] . '</a></h3>';
        echo '<p>' . $row["notizia_en"] . '</p>';
        echo '<a href="#" class="btn-custom">Continue <span class="fa fa-long-arrow-right"></span></a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
=======
<?php
>>>>>>> ed4f31fdbea0c959202447635e78c284c5419a09
} else {
echo "No se encontró la noticia.";
}
 
// Incluir el archivo de pie de página
require_once('footer.php');
?>

<?php require_once('header.php') ?>

<section class="hero-wrap hero-wrap-2" style="background-image: url('images/blog.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate mb-5 text-center">
                <p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.html">Home <i
                                class="fa fa-chevron-right"></i></a></span> <span>Blog <i
                            class="fa fa-chevron-right"></i></span></p>
                <h2 class="mb-0 bread">Blog</h2>
            </div>
        </div>
    </div>
</section>

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
} else {
    echo "0 results";
}
$conn->close();
?>
</section>

<?php require_once('footer.php') ?>
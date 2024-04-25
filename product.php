<?php require_once('header.php'); ?>
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/products.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate mb-5 text-center">
                <p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.php">Home <i
                                class="fa fa-chevron-right"></i></a></span> <span>Products <i
                            class="fa fa-chevron-right"></i></span></p>
                <h2 class="mb-0 bread">Products</h2>
            </div>
        </div>
    </div>
</section>
<?php
// Conexión a la base de datos (debes cambiar estos valores por los tuyos)
$servername = "localhost";
$username = "root";
$password = "1WMG2023";
$dbname = "3m";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar la conexión
if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para obtener los productos
$sql = "SELECT * FROM produktuak";
$result = $conn->query($sql);

?>

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <?php
          // Iterar sobre los resultados de la consulta y generar HTML para cada producto
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="col-md-4 col-xs-12 d-flex">';
                echo '<div class="product ftco-animate">';
                echo '<div class="img d-flex align-items-center justify-content-center" style="background-image: url(images/' . $row["Irudia"] . ');">';
                echo '<div class="desc">';
                echo '<p class="meta-prod d-flex">';
                echo '<a href="#" class="d-flex align-items-center justify-content-center comprar" id="bag"     data-nombre="' . $row["izena"] . '" data-precio="' . $row["prezioa"] . '"><span class="flaticon-shopping-bag"></span></a>';
                echo '<a href="#" class="d-flex align-items-center justify-content-center"><span class="flaticon-visibility"></span></a>';
                echo '</p>';
                echo '</div>';
                echo '</div>';
                echo '<div class="text text-center">';
                echo '<span class="category">' . $row["izena"] . '</span>';
                echo '<h2>' . $row["kategoria"] . '</h2>';
                echo '<span class="price">' . $row["prezioa"] . '</span>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
          } else {
            echo "0 resultados";
          }
          // Comprobar si se hizo clic en el ícono de la bolsa de compras
         ?>
                </div>

            </div>
        </div>
    </div>
</section>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('.comprar').click(function() {
        // Obtener los detalles del producto del atributo de datos
        var nombre = $(this).data('nombre');
        var precio = $(this).data('precio');
        var modelo = $(this).data('modelo');
        var imagen = $(this).data('imagen');

        // Enviar los detalles del producto al servidor
        $.post('guardar_en_session.php', {
            nombre: nombre,
            precio: precio,
            modelo: modelo,
            imagen: imagen
        }, function(data) {
            // Hacer algo con la respuesta del servidor si es necesario
            console.log(data);
        });
    });
});
</script>

<script>
$(document).ready(function() {
    $('#bag').click(function() {
        // Aquí debes enviar los detalles del producto al servidor
        $.get('agregar_a_la_cesta.php', function(data) {
            // Actualizar el número total de productos en la cesta con la respuesta del servidor
            $('#cantidadtotal').text(data);
        });
    });
});
</script>




<?php
// Cerrar conexión
$conn->close();
?>


</section>
<?php require_once ('footer.php'); ?>
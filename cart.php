<?php require_once('header.php'); ?>
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/cart.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate mb-5 text-center">
                <p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.html">Home <i
                                class="fa fa-chevron-right"></i></a></span> <span>Cart <i
                            class="fa fa-chevron-right"></i></span></p>
                <h2 class="mb-0 bread">My Cart</h2>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="table-wrap">
                <table class="table">
                    <thead class="thead-primary">
                        <tr>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Verificar si hay productos en la sesión
                        if (isset($_SESSION['productos']) && !empty($_SESSION['productos'])) {
                            foreach ($_SESSION['productos'] as $producto) {
                                ?>
                        <tr class="alert" role="alert">
                            <td>
                                <label class="checkbox-wrap checkbox-primary">
                                    <input type="checkbox" checked>
                                    <span class="checkmark"></span>
                                </label>
                            </td>
                            <td>
                                <!-- Aquí puedes colocar la imagen del producto -->
                                <div class="img" style="background-image: url(images/prod-1.jpg);"></div>
                            </td>
                            <td>
                                <div class="email">
                                    <span><?php echo $producto['nombre']; ?></span>
                                    <!-- Puedes mostrar más detalles del producto si lo deseas -->
                                </div>
                            </td>
                            <td><?php echo $producto['precio']; ?></td>
                            <td class="quantity">
                                <div class="input-group">
                                    <input type="text" name="quantity" class="quantity form-control input-number"
                                        value="1" min="1" max="100">
                                </div>
                            </td>
                            <!-- Aquí puedes calcular el total (precio * cantidad) -->
                            <td><?php echo $producto['precio']; ?></td>
                            <td>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i href="eliminar_producto.php?eliminar=0"
                                            class="fa fa-close"></i></span>
                                </button>
                            </td>
                        </tr>
                        <?php
                            }
                        } else {
                            // Si no hay productos en la sesión, mostrar un mensaje
                            echo "<tr><td colspan='7'>No hay productos en el carrito.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
                <!-- Aquí puedes mostrar el total del carrito -->
                <div class="cart-total mb-3">
                    <h3>Cart Totals</h3>
                    <?php
// Calculamos el subtotal sumando los precios de todos los productos en la sesión
$subTotal = 0;
if(isset($_SESSION['productos']) && !empty($_SESSION['productos'])) {
    foreach ($_SESSION['productos'] as $producto) {
        $subTotal += $producto['precio'];
    }
}

// Calcular el total (sumando el subtotal y la entrega y luego restando el descuento si es aplicable)
$total = $subTotal;

// Mostrar los valores
echo "Total: $" . number_format($total, 2);
?>

                    <?php
// Iniciar la sesión si no está iniciada

// Función para eliminar un producto del carrito por su índice
function eliminarProductoCarrito($indice) {
    // Verificar si el índice existe en la sesión
    if (isset($_SESSION['productos'][$indice])) {
        // Eliminar el producto del carrito utilizando el índice
        unset($_SESSION['productos'][$indice]);
        return true; // Indicar que el producto fue eliminado correctamente
    } else {
        return false; // Indicar que el índice no existe en el carrito
    }
}

// Llamar a la función si se recibió un índice de producto para eliminar
if (isset($_GET['eliminar']) && $_GET['eliminar'] !== '') {
    $indice = $_GET['eliminar'];
    $eliminado = eliminarProductoCarrito($indice);
    if ($eliminado) {
        echo "El producto fue eliminado del carrito.";
    } else {
        echo "El producto no pudo ser encontrado en el carrito.";
    }
}
?>

                </div>
                <div> <a href="checkout.php" class="btn btn-primary py-3 px-4" id="proceedToCheckoutBtn">Proceed to
                        Checkout</a>
                </div>
                </p>
            </div>
        </div>
    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('#proceedToCheckoutBtn').click(function(e) {

        // Realizar una solicitud AJAX al servidor
        $.ajax({
            type: 'POST', // Método HTTP
            url: 'insertar_pedido.php', // Ruta del script PHP que maneja la inserción del pedido
            data: {}, // Puedes enviar datos adicionales aquí si es necesario
            success: function(response) {
                window.location.href = "checkout.php";
                // Aquí puedes agregar cualquier lógica adicional después de recibir la respuesta del servidor
            }
        });
    });
});
</script>

<?php require_once('footer.php'); ?>
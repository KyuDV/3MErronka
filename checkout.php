<?php require_once('header.php');?>
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/checkout.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate mb-5 text-center">
                <p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.php">Home <i
                                class="fa fa-chevron-right"></i></a></span> <span>Checkout <i
                            class="fa fa-chevron-right"></i></span></p>
                <h2 class="mb-0 bread">Checkout</h2>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 ftco-animate">
                <form method="POST" action="insertar_pedido.php" class="billing-form">
                    <h3 class="mb-4 billing-heading">Billing Details</h3>
                    <div class="row align-items-end">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstname">First Name</label>
                                <input type="text" class="form-control" name="firstname"
                                    placeholder="Enter your first name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lastname">Last Name</label>
                                <input type="text" class="form-control" name="lastname"
                                    placeholder="Enter your last name" required>
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="country">Country</label>
                                <input type="text" class="form-control" name="country" placeholder="Enter your country"
                                    required>
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="streetaddress">Street Address</label>
                                <input type="text" class="form-control" name="streetaddress"
                                    placeholder="Enter your street address" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="appartment">Apartment / Suite</label>
                                <input type="text" class="form-control" name="appartment"
                                    placeholder="Enter your apartment or suite">
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="towncity">Town / City</label>
                                <input type="text" class="form-control" name="towncity"
                                    placeholder="Enter your town or city" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="postcodezip">Postcode / ZIP *</label>
                                <input type="text" class="form-control" name="postcodezip"
                                    placeholder="Enter your postcode or ZIP" required>
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" name="phone"
                                    placeholder="Enter your phone number" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="emailaddress">Email Address</label>
                                <input type="email" class="form-control" name="emailaddress"
                                    placeholder="Enter your email address" required>
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-12">
                            <div class="form-group mt-4">
                                <input type="submit" value="Place Order" class="btn btn-primary py-3 px-4">
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row mt-5 pt-3 d-flex">
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
                            </p>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="radio">
                            <label><input type="radio" name="optradio" class="mr-2"> Cart Payment</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="radio">
                            <label><input type="radio" name="optradio" class="mr-2"> Paypal</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label><input type="checkbox" value="" class="mr-2"> I have read and accept the
                                terms and conditions</label>
                        </div>
                    </div>
                </div>
                <p><input type="submit" value="Place Order" class="btn btn-primary py-3 px-4" id="placeOrderBtn">
            </div>
            </p>
        </div>
    </div>
    </div>
    </div> <!-- .col-md-8 -->
    </div>
    </div>
</section>
<?php require_once('footer.php');?>
<script>
$(document).ready(function() {
    $('#placeOrderBtn').click(function(e) {


        // Realizar una solicitud AJAX al servidor
        $.ajax({
            type: 'POST', // Método HTTP
            url: 'insertar_pedido2.php', // Ruta del script PHP que maneja la inserción del pedido
            data: {}, // Puedes enviar datos adicionales aquí si es necesario
            success: function(response) {
                window.location.href = "payment.php";
                // Aquí puedes agregar cualquier lógica adicional después de recibir la respuesta del servidor
            }
        });
    });
});
</script>
<?php require_once('header.php'); ?>
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/config.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate mb-5 text-center">
                <p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.php">Home <i
                                class="fa fa-chevron-right"></i></a></span> <span>Configuration <i
                            class="fa fa-chevron-right"></i></span></p>
                <h2 class="mb-0 bread">Configuration</h2>
            </div>
        </div>
    </div>
</section>

<body>
    <form method="POST" id="settingsForm" name="settingsForm" class="settingsForm">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="label" for="primaryColor">Primary Color</label>
                    <input type="color" class="form-control" name="primaryColor" id="primaryColor">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="label" for="secondaryColor">Secondary Color</label>
                    <input type="color" class="form-control" name="secondaryColor" id="secondaryColor">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="label" for="language">Language</label>
                    <select name="language" id="language" class="form-control">
                        <!-- Aquí cargarías las opciones de idioma desde tu archivo XML -->
                        <!-- Ejemplo de opción de idioma -->
                        <option value="en">English</option>
                        <option value="es">Spanish</option>
                        <!-- Puedes cargar estas opciones dinámicamente con JavaScript -->
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <input type="submit" value="Save Settings" class="btn btn-primary">
                    <div class="submitting"></div>
                </div>
            </div>
        </div>
    </form>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        // Detectar el envío del formulario de configuración
        $('#settingsForm').submit(function(event) {
            event.preventDefault(); // Evitar el envío del formulario por defecto

            // Obtener los valores de los colores seleccionados
            const primaryColor = $('#primaryColor').val();
            const secondaryColor = $('#secondaryColor').val();

            // Actualizar las variables CSS con los colores seleccionados
            $('body').css('--variable-color-princ', primaryColor);
            $('body').css('--variable-color-btn', secondaryColor);

            // Enviar los valores de las variables CSS al servidor para guardarlos en el archivo XML
            $.ajax({
                type: 'POST',
                url: 'guardar_conf.php', // Cambia 'guardar_configuracion.php' por la URL de tu script de servidor
                data: {
                    primaryColor: primaryColor,
                    secondaryColor: secondaryColor
                },
                success: function(response) {
                    // Aquí puedes mostrar algún mensaje de éxito o realizar otras acciones después de guardar la configuración
                },
                error: function(xhr, status, error) {
                    // Manejar errores aquí si es necesario
                }
            });
        });
    });
    </script>

    <?php require_once ('footer.php'); ?>
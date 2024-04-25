
    $(document).ready(function() {
        // Detectar el envío del formulario de configuración
        $('#settingsForm').submit(function(event) {
            event.preventDefault(); // Evitar el envío del formulario por defecto

            // Obtener los valores de los colores seleccionados
            const primaryColor = $('#primaryColor').val();
            const secondaryColor = $('#secondaryColor').val();

            // Actualizar los estilos CSS de los elementos relevantes
            $('.change-color').css('background-color', primaryColor);
            $('.change-color:last-child').css('background-color', secondaryColor);

            // Aquí podrías enviar los valores de los colores al servidor para guardarlos en el archivo XML
        });
    });



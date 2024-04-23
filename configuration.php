<?php require_once('header.php'); ?>

<body>
    <h2>Configuración de la Página</h2>
    <form id="configForm">
        <label for="fondoColor">Color de Fondo:</label>
        <input type="color" id="fondoColor" name="fondoColor"><br><br>

        <label for="textoColor">Color de Texto:</label>
        <input type="color" id="textoColor" name="textoColor"><br><br>

        <label for="idioma">Idioma:</label>
        <select id="idioma" name="idioma">
            <option value="es">Español</option>
            <option value="en">Inglés</option>
            <!-- Puedes agregar más opciones de idioma aquí -->
        </select><br><br>

        <input type="button" value="Guardar Configuración" id="guardarConfigBtn">
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/configuration.js"></script>
    <?php require_once ('footer.php'); ?>
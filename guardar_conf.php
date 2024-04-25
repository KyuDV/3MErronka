<?php
// Verificar si se recibieron los datos del formulario mediante POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores de colores enviados desde el formulario
    $primaryColor = $_POST['primaryColor'];
    $secondaryColor = $_POST['secondaryColor'];

    // Crear un nuevo documento XML
    $xml = new DOMDocument('1.0', 'utf-8');
    $xml->formatOutput = true;

    // Crear el elemento raíz <configuracion>
    $configuracion = $xml->createElement('configuracion');
    $xml->appendChild($configuracion);

    // Crear y agregar los elementos de color al elemento raíz
    $primaryColorElement = $xml->createElement('primaryColor', $primaryColor);
    $configuracion->appendChild($primaryColorElement);

    $secondaryColorElement = $xml->createElement('secondaryColor', $secondaryColor);
    $configuracion->appendChild($secondaryColorElement);

    // Guardar el documento XML en un archivo
    $xmlFile = 'configuration.xml'; // Nombre del archivo XML
    $xml->save($xmlFile);

    // Respuesta de éxito
    echo json_encode(array('success' => true));
} else {
    // Si no se recibieron los datos por POST, responder con un error
    echo json_encode(array('error' => 'No se recibieron datos POST'));
}
?>
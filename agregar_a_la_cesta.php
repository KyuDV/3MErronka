<?php
session_start(); // Inicia la sesión si no está iniciada

// Incrementar el contador de la cesta en la sesión
$_SESSION['contador_cesta'] = isset($_SESSION['contador_cesta']) ? $_SESSION['contador_cesta'] + 1 : 1;

// Devolver el número actualizado de productos en la cesta
echo $_SESSION['contador_cesta'];
?>
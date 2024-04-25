<?php
session_start();

if(isset($_POST['carrito'])) {
    $_SESSION['carrito'] = $_POST['carrito'];
}

?>
<?php
include ('../../config/conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];

    if ($nombre == "" || $precio == "") {
        echo "error";
        exit;
    }

    $stmt = $conn -> prepare("INSERT INTO servicios (nombre, precio) VALUES (?, ?)");
    $stmt -> bind_param("sd", $nombre, $precio);

    if ($stmt -> execute()) {
        echo "ok"; 
    } else {
        echo "error";
    }

    $stmt -> close();
    $conn -> close();
}
?>
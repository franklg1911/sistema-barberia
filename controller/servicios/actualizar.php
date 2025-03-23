<?php
include ('../../config/conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];

    if ( $id == "" ||$nombre == "" || $precio == "") {
        echo "error";
        exit;
    }

    $stmt = $conn -> prepare("UPDATE servicios SET nombre = ?, precio = ? WHERE id = ?");
    $stmt -> bind_param("sdi", $nombre, $precio, $id);

    if ($stmt -> execute()) {
        echo "ok"; 
    } else {
        echo "error";
    }

    $stmt -> close();
    $conn -> close();
}
?>
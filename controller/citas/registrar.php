<?php
include ('../../config/conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cliente = $_POST["cliente"];
    $fecha = $_POST["fecha"];
    $hora = $_POST["hora"];
    $servicio = $_POST["servicio"];
    $empleado = $_POST["empleado"];
    $estado = $_POST["estado"];

    if ($cliente == "" || $fecha == "" || $hora == "" || $servicio == "" || $empleado == "" || $estado == "") {
        echo "error";
        exit;
    }

    if (!in_array($estado, ['pendiente', 'completa', 'cancelada'])) {
        echo "error estado: invalido";      
        exit;
    }

    $stmt = $conn -> prepare("INSERT INTO citas (cliente_nombre, fecha , hora, servicio_id, usuario_id, estado) VALUES (?, ?, ?, ?, ?, ?)");

    $stmt -> bind_param("sssiis", $cliente, $fecha, $hora, $servicio, $empleado, $estado);

    if ($stmt -> execute()) {
        echo "ok"; 
    } else {
        echo "error";
    }

    $stmt -> close();
}

$conn -> close();
?>
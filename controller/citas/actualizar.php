<?php
include ('../../config/conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $cliente = $_POST["cliente"];
    $fecha = $_POST["fecha"];
    $hora = $_POST["hora"];
    $servicio = $_POST["servicio"];
    $empleado = $_POST["empleado"];
    $estado = $_POST["estado"];

    if ( $id == "" || $cliente == "" || $fecha == "" || $hora == "" || $servicio == "" || $empleado == "" || $estado == "") {
        echo "error";
        exit;
    }

    $stmt = $conn -> prepare("UPDATE citas SET cliente_nombre = ?, fecha = ?, hora = ?, servicio_id = ?, usuario_id = ?, estado = ? WHERE id = ?");
    $stmt -> bind_param("ssssssi", $cliente, $fecha, $hora, $servicio, $empleado, $estado, $id);

    if ($stmt -> execute()) {
        echo "ok";
        exit; 
    } else {
        echo "error";
        exit;
    }

    $stmt -> close();
    $conn -> close();
}
?>
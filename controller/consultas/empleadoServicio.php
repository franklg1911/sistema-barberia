<?php
include '../../config/conexion.php';

$queryServicios = "SELECT * FROM servicios";
$resultServicios = $conn->query($queryServicios);

$queryEmpleados = "SELECT * FROM usuarios";
$resultEmpleados = $conn->query($queryEmpleados);
?>
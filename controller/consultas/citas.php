<?php
include '../../config/conexion.php';

$usuario_id = $_SESSION['id'];
$rol = $_SESSION['role'];

if ($rol == 'admin') {
    // El admin ve todas las citas
    $queryCitas = "SELECT c.id, c.cliente_nombre, c.fecha, c.hora, 
                          s.id AS servicio_id, s.nombre AS servicio, 
                          u.id AS usuario_id, u.username AS empleado, 
                          c.estado 
                   FROM citas c
                   JOIN servicios s ON c.servicio_id = s.id
                   JOIN usuarios u ON c.usuario_id = u.id
                   ORDER BY c.id ASC";
} else {
    // El empleado solo ve sus citas
    $queryCitas = "SELECT c.id, c.cliente_nombre, c.fecha, c.hora, 
                          s.id AS servicio_id, s.nombre AS servicio, 
                          u.id AS usuario_id, u.username AS empleado, 
                          c.estado 
                   FROM citas c
                   JOIN servicios s ON c.servicio_id = s.id
                   JOIN usuarios u ON c.usuario_id = u.id

                   -- $usuario_id: variable que contiene el id del usuario logueado
                   WHERE c.usuario_id = '$usuario_id'
                   ORDER BY c.id ASC";
}

$resultCitas = $conn->query($queryCitas);

?>
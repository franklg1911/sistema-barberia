<?php
include ('../../config/conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    if ( empty($id)) {
        echo "error";
        exit;
    }

    $stmt = $conn -> prepare("DELETE FROM citas WHERE id = ?");
    $stmt -> bind_param("i", $id);

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
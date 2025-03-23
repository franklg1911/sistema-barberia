<?php
include ('../../config/conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    if ( $id == "" ||$username == "" || $password == "" || $role == "") {
        echo "error";
        exit;
    }

    $stmt = $conn -> prepare("UPDATE usuarios SET username = ?, password = ?, role = ? WHERE id = ?");
    $stmt -> bind_param("sssi", $username, $password, $role, $id);

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
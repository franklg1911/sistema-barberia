<?php
include ('../../config/conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $contraseña = $_POST["contraseña"];
    $rol = $_POST["rol"];

    if ($usuario == "" || $contraseña == "" || $rol == "") {
        echo "error";
        exit;
    }

    // Validar que el rol sea 'admin' o 'user'
    // in_array($rol, ['admin', 'user']): Verifica si el valor de la variable $rol está dentro del array ['admin', 'user'].
    if (!in_array($rol, ['admin', 'user'])) {   
        echo "error rol: invalido";
        exit;
    }

    // Hashear la contraseña antes de guardar en la bd
    // password_hash: es una función de PHP que genera un hash seguro de la contraseña para almacenarla de forma segura en la base de datos.
    // PASSWORD_DEFAULT: Es el algoritmo de encriptación recomendado por PHP en la versión actual. Actualmente, usa bcrypt, pero en el futuro podría cambiar.
    // $contraseñaHash : Guarda la contraseña hasheada.
    // $contraseñaHash = password_hash($contraseña, PASSWORD_DEFAULT);

    $stmt = $conn -> prepare("INSERT INTO usuarios (username, password, role) VALUES (?, ?, ?)");
    $stmt -> bind_param("sss", $usuario, $contraseña, $rol);

    if ($stmt -> execute()) {
        echo "ok"; 
    } else {
        echo "error";
    }

$stmt -> close();

}

$conn -> close();
?>
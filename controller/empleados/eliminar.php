<?php
include ('../../config/conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    //Valida que el id no esté vacío
    //Si el ID está vacío o no se envió correctamente, se imprime "error" y el script se detiene con exit;.
    // Esto previene eliminar datos incorrectos o que no existan.
    if ( empty($id)) {
        echo "error";
        exit;
    }

    $stmt = $conn -> prepare("DELETE FROM usuarios WHERE id = ?");
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
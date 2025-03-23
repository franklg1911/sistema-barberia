<?php
session_start();

include_once '../../config/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $stmt = $conn -> prepare("SELECT id, username, password, role FROM usuarios WHERE username = ?");
    $stmt -> bind_param("s", $usuario);
    $stmt -> execute();

    // get_result(): obtiene el conjunto de resultados de la consulta ejecutada
    $resultado = $stmt->get_result();

    // Verifica si hay un usuario con las credenciales ingresadas
    // num_rows === 1: significa que se encontró exactamente un usuario con ese nombre.
    if ($resultado -> num_rows == 1) {

        // fetch_assoc(): obtiene los datos del usuario en un array asociativo ($fila).
        // Este array contendrá datos como id, username, password, role, etc.
        $fila = $resultado -> fetch_assoc();


        // password_verify($password, $fila['password']): compara la contraseña ingresada con la almacenada en la base de datos.
        // if (password_verify($password, $fila['password'])) { // Quitada temporalmente para pruebas

        if ($password == $fila['password']) {

            // Crea una sesión para el usuario
            // Se guardan datos del usuario en la sesión ($_SESSION), lo que permitirá recordarlo mientras navega por el sitio.
            $_SESSION['id'] = $fila['id'];
            $_SESSION['usuario'] = $fila['username'];
            $_SESSION['role'] = $fila['role'];


            // Responde con JSON y redirige según el rol del usuario
            echo json_encode([
                "success" => true,
                "alerta" => '<div class="alert alert-success">Acceso exitoso, redirigiendo...</div>',
                "redirect" => ($fila['role'] === 'admin') ? "../sistema-barberia/pages/admin/dashboard.php" : "../sistema-barberia/pages/user/dashboard.php"
            ]);
            
        // Si la contraseña no coincide, se devuelve un error:
        } else {
            echo json_encode(["success" => false, "alerta" => '<div class="alert alert-danger">Contraseña incorrecta.</div>']);
        }

    // Si no se encontró un usuario con las credenciales ingresadas 
    } else {
        echo json_encode(["success" => false, "alerta" => '<div class="alert alert-danger">Usuario no encontrado.</div>']);
    }

    $stmt -> close();
    $conn -> close();
}
?>
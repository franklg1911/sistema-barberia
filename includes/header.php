<?php
session_start();

if (!isset($_SESSION['id']) || !isset($_SESSION['role'])) {
    session_destroy();
    header("Location: /sistema-barberia/index.php");
    exit();
}

$rol = $_SESSION['role'];

if ($rol !== 'admin' && $rol !== 'user') {
    session_destroy();
    header("Location: /sistema-barberia/index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!------------------ Icono pestaña ------------------>
    <link rel="icon" href="../../assets/image/icons/icono-pestaña.png" type="image/png">

    <!-------------------- Custom css ------------------->
    <link rel="stylesheet" href="../../assets/css/custom.css" />

    <!---------------- Boostrap v4.5.3 ------------------>
    <link rel="stylesheet" href="../../assets/vendor/bootstrap/css/bootstrap.min.css" />

    <!---------------- Font-awesome v6.7.2 ------------------>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Dashboard</title>
</head>

<body>
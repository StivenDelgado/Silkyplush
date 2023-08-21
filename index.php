<?php
session_start();

require './db/db.php';

if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, nombre, apellido, correo, contrasena FROM usuarios WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;
    if (count($results) > 0) {
        $user = $results;
    } 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>sasda</title>
</head>
<body>
    <?php require './components/Header.php' ?>
    <?php if(!empty($user)): ?>
        <br> Bienvenido. <?= $user['nombre']; ?>
        <br>Has iniciado sesión correctamente
        <a href="logout.php">Cerrar sesión</a>
</body>
</html>
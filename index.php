<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel="stylesheet" href="./assets/css/Footer.css">
    <link rel="stylesheet" href="./assets/css/index.css">
    <title>sasda</title>
</head>
<body>

    <?php require './components/Header.php' ?>
    <div class="box">

        Hola <?php echo $_SESSION['name'] ,"<br>" ,  $_SESSION['email'], "<br>", $_SESSION['password'] ?>
    <br> Bienvenido. 
        <br>Has iniciado sesión correctamente
        <a href="logout.php">Cerrar sesión</a>
    </div>

    <?php require './components/Footer.php' ?>
</body>
</html>
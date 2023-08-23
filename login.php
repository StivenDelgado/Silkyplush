<?php
  SESSION_START();
?>
<!DOCTYPE html>
<html lang="en">
<head></head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/header.css">    
    <link rel="stylesheet" href="./assets/css/Footer.css">
    <title>Login</title>
</head>
<body>
  <?php require './components/Header.php' ?>
    <div class='container-form'>
    <?php

  include("./db/db.php");
  if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $verify_query = mysqli_query($conn,"SELECT * FROM usuarios WHERE email='$email' AND password='$password'") or die("Select error");
    $row = mysqli_fetch_assoc($verify_query);
    
    if(is_array($row) && !empty($row)){ 
      $_SESSION['id'] = $row['id'];
      $_SESSION['name'] = $row['name'];
      $_SESSION['lastname'] = $row['lastname'];
      $_SESSION['email'] = $row['email'];
      $_SESSION['password'] = $row['password'];
      header("Location: ./index.php");
    }else{
      echo "<div class='message'>
                <p>Usuario o contraseña incorrectos!</p>
                <a href='login.php'>Reintentar</a>
            </div> 
            <br>";
    }
  }else{
?>
    <form action="login.php" method="POST">
        <div class='container-title'>
            <h1>Inicio de sesión</h1>
        </div>
        <div class='container-inputs'>
        <label for="email">Nombre de usuario</label>
        <input type="email" name="email" placeholder="Correo">
        <label for="password">Contraseña</label>
        <input type="password" name="password" placeholder="Contraseña">
        <input type="submit" name="submit" value="Iniciar sesión">
        </div>
    </form>  
    <?php } ?>
    </div>  
    <?php require './components/Footer.php' ?>
</body>
</html>

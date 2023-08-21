<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: /php-login');
  }
  require './db/db.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, nombre, apellido, correo, contrasena FROM usuarios WHERE correo = :email');
    $records->bindParam(':email', $_POST['correo']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header("Location: /php-login");
    } else {
      $message = 'Perdón, las credenciales no coinciden';
    }
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">    
    <title>Login</title>
</head>
<body>
    <div class='container-form'>
    <form action="login.php" method="post">
        <div class='container-title'>
            <h1>Inicio de sesión</h1>
        </div>
        <div class='container-inputs'>
        <label for="correo">Nombre de usuario</label>
        <input type="text" name="correo" placeholder="Correo">
        <label for="password">Contraseña</label>
        <input type="password" name="password" placeholder="Contraseña">
        <input type="submit" value="Iniciar sesión">
        </div>
    </form>  
    </div>  
</body>
</html>
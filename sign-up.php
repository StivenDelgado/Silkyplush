<?php
    require 'db/db.php';

    $message = '';

    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $sql = "INSERT INTO usuarios (nombre, apellido, correo, contrasena) VALUES (:nombre, :apellido, :correo , :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nombre', $_POST['name']);
        $stmt->bindParam(':apellido', $_POST['lastname']);
        $stmt->bindParam(':correo', $_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $stmt->bindParam(':password', $password);

        if ($stmt->execute()) {
            $message = 'Se ha creado el usuario';
        } else {
            $message = 'No se ha creado el usuario';
        }
      }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/signup.css">
    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel="stylesheet" href="./assets/css/Footer.css">
    <title>Sig-up</title>
</head>
<body>

    <?php require './components/Header.php' ?>

    <div class='container-form-s'>
        
        
        <form action="sign-up.php" method="POST">
        <?php if(!empty($message)): ?>
            <div class='modal'>
            <p> <?= $message ?></p>
            </div>
        <?php endif; ?>
            <div class='container-title-s'>
                <h1>Resgistrarse</h1>
            </div>
            <div class='container-inputs-s'>

                <label for="name">Nombre</label>
                <input type="text" name="name" placeholder="Nombre">

                <label for="lastname">Apellido</label>
                <input type="text" name="lastname" placeholder="Apellido">

                <label for="correo"> Correo</label>
                <input type="correo" name="email" placeholder="Correo">

                <label for="password">Contraseña</label>
                <input type="password" name="password" placeholder="Contraseña">

                <label for="confirm_password">Confirmar contraseña</label>
                <input type="password" name="confirm_password" placeholder="Confirm Password">

                <input type="submit" value="Registrarse">
            </div>
        </form>
    </div>

    <?php require './components/Footer.php' ?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/signup.css">
    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel="stylesheet" href="./assets/css/Footer.css">
    <title>Sign-up</title>
</head>
<body>

    <?php require './components/Header.php' ?>

    <div class='container-form-s'>
    <?php
    include("./db/db.php");

         if(isset($_POST['submit'])){
            $username = $_POST['name'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $verify_query = mysqli_query($conn,"SELECT email FROM usuarios WHERE email='$email'");
         if(mysqli_num_rows($verify_query) != 0){
            echo "<div class='message error'>
                      <p>El correo ya existe!</p>
                      <a href='sign-up.php'>Reintentar</a>
                  </div> 
                  <br>";
            $email = '';
         }
         else{
            mysqli_query($conn,"INSERT INTO usuarios(name,lastname,email,password) VALUES('$username','$lastname','$email','$password')") or die("Erroe Occured");
            echo "<div class='message success'>
                      <p>Usuario registrado correctamente!</p>
                      <a href='login.php'>Iniciar sesión</a>
                  </div> <br>";
         }  
        }else{
        ?>
        <form  action="sign-up.php" method="POST">
            <div class='container-title-s'>
                <h1>Resgistrarse</h1>
            </div>
            <div class='container-inputs-s'>
                
                <label for="name">Nombre</label>
                <input type="text" name="name" placeholder="Nombre" require>

                <label for="lastname">Apellido</label>
                <input type="text" name="lastname" placeholder="Apellido" require>

                <label for="email"> Correo</label>
                <input type="email" name="email" placeholder="Correo" require>

                <label for="password">Contraseña</label>
                <input type="password" name="password" placeholder="Contraseña" require>

                <label for="confirm_password">Confirmar contraseña</label>
                <input type="password" name="confirm_password" placeholder="Confirm Password">

                <input type="submit" name="submit" value="Registrarse">
            </div>
        </form>
        <?php } ?>
    </div>
    
    <?php require './components/Footer.php' ?>

    <script src="https://kit.fontawesome.com/d376442cc6.js" crossorigin="anonymous"></script>
</body>
</html>
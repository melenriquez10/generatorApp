<?php
include('conex.php');

if (isset($_POST['boton'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirpass = $_POST['confirpass'];

    
    if ($password !== $confirpass) {
        $mensaje = "Las contraseñas no coinciden";
    } else {
        
        $sql = "INSERT INTO usuarios (email, password) VALUES ('$email', '$password')";
        $conn = conectar(); 
        if (mysqli_query($conn, $sql)) {

            header("Location: login.php");
            exit();
        } else {
            // Si ocurre un error en la consulta
            $mensaje = "Error al agregar el usuario: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
</head>
<body bgcolor="#D7BDE2">
    <center>
        <h1>Registrate</h1>
         <link rel="stylesheet" href="stylee.css">
        <form method="POST">
            <p>Correo Electrónico (Email):<input type="email" name="email" required></p>
            <p>Contraseña:<input type="password" name="password" required></p>
            <p>Repetir Contraseña:<input type="password" name="confirpass" required></p>
            <p><input type="submit" value="Registrarse" name="boton"></p>
        </form>
        <?php
        if (isset($mensaje)) {
            echo "<p>$mensaje</p>";
        }
        ?>
    </center>
</body>
</html>

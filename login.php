<!DOCTYPE html>
<html>
<head>
    <title>webgenerator Melany Enriquez</title>
</head>
<body bgcolor="#94a0a9">
    
    <h1>Webgenerator Melany Enriquez</h1>
    <link rel="stylesheet" href="style.css">

    <form name="fvalida" action="" method="POST">
        <center>
            <table>
                <tr>
                    <td><label for="email">Correo Electrónico (Email):</label></td>
                    <td><h1><input type="email" id="email" name="email" size="30" maxlength="100" required></h1></td>
                </tr>
                <tr>
                    <td><label for="password">Contraseña:</label></td>
                    <td><input type="password" id="password" name="password" size="30" maxlength="100" required></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" value="Ingresar"></td>
                </tr>
            </table>
        </center>
    </form>

    <p>¿No tienes una cuenta? <a href="register.php">Regístrate aquí</a></p>

  <?php
    session_start();
    require('conex.php');
    $mens = "";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $email = $_POST['email'];
        $contrasena = $_POST['password'];

        if ($email === 'admin@server.com' && $contrasena === 'serveradmin') {
            $_SESSION['id_usuario'] = 999;
            $_SESSION['usuario'] = $email;
            header('location: panel.php');
        } else {
            $db = conectar();
            $sql = "SELECT * FROM usuarios WHERE email = '$email'";
            $result = $db->query($sql);
            if ($result->num_rows > 0) {
                $usuario = $result->fetch_assoc();
                if ($usuario["contrasena"] == $password) {
                    $_SESSION['usuario'] = $email;
                    $_SESSION['id_usuario'] = $usuario['id_usuario'];
                    header('location: panel.php');
                } else {
                    $mens = "La contraseña es incorrecta";
                }
            } else {
                $mens = "El usuario no existe";
            }
        }
    }
    ?>
</body>
</html>

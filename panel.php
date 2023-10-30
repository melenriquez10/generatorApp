<!DOCTYPE html>
<html>
<head>
    <title>Bienvenido a tu panel</title>
</head>
<body>
    <center><h1>panel</h1></center>
    <link rel="stylesheet" href="panel.css">


    
  <center><p> <a href="logout.php">Cerrar session</a></p></center>

    
    <center><form action="" method="post">
        <label for="nombre">Generar Web de:</label>
        <input type="text" id="nombre" name="nombre" required>
        <input type="submit" value="boton" name="boton">
    </form></center>
</body>
</html>


       
  <?php
    session_start();
    $idUsuario = $_SESSION['id_usuario'];
    include('conex.php');
    $conn = conectar();

if (isset($_GET['id'])){
    $idi=$_GET['id'];
    shell_exec("chmood 757");
    $sqll= "DELETE FROM `webs` WHERE `webs`.`id_web` = '$idi'";
    $resultList = mysqli_query($conn, $sqll);
     if (($resultList)) {
        echo"se borro capoooooo";

        } else {
            echo "No se borro toma pa vos.";

            echo"<br>";
        }

}
        if (isset($_GET['botonzip'])) {
        shell_exec('zip '.$_GET['botonzip'].".zip web/".$_GET['botonzip']);
        shell_exec('mv '.$_GET['botonzip'].".zip zips/".$_GET['botonzip'].".zip");
        header("Location: zips/".$_GET['botonzip'].".zip");
}

if (isset($_POST['boton'])) {
    $nom = $_POST['nombre'];
  

    $sql = "INSERT INTO `webs` (`id_usuario`, `dominio`) VALUES ('$idUsuario', '$nom')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
    shell_exec("chmod 757");
     
     shell_exec("./wix.sh ".$nom );
      
        echo "La web se ha creado correctamente.";
    } else {
    
        echo "Error al insertar la web en la base de datos: " . mysqli_error($conn);
    }
} 
$list="";
    if ($idUsuario==999) {
        $list ="SELECT *  FROM webs";
    }else{
            $list ="SELECT *  FROM webs WHERE id_usuario ='$idUsuario'";
    }
  $sqlList = $list;
        $resultList = mysqli_query($conn, $sqlList);

        if (mysqli_num_rows($resultList) > 0) {
            echo "<form>";
            while ($row = mysqli_fetch_assoc($resultList)) {
                $dominio = $row['dominio'];
                $idUsuario = $row['id_usuario'];
                 $idWeb = $row['id_web'];

             
                echo "<a href='web/$dominio/index.php'>$dominio</a>";
                  echo " <a href='?id=$idWeb'>Eliminar</a>";
                   

                echo " <input id='Agregar_link' ".$row['id_web']." type='submit' name='botonzip' value='Descargar  ".$row
                   ["dominio"]."' >";


             
               
                echo "<br>";
            }
            echo "</form>";
        } else {
            echo "No se encontraron webs.";
        }

?>

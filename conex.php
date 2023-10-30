<?php

function conectar()
{
$host="localhost";
$usuario="adm_webgenerator";
$clave="webgenerator2020";
$dbnombre="webgenerator";

$conn=mysqli_connect($host,$usuario,$clave,$dbnombre);// conecto a la base de datos.

    if(mysqli_connect_errno())//pregunta si se conecto o no la base de datos.
    {
         echo "conexion No establecida".mysqli_connect_error();
    }
    
    else
    {
         echo"";

    }
    
return $conn;

}


?>
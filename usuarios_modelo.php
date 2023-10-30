<?php
	
	require('conex.php');

	 function getUsers(){
        $query = ejecutarQuery('SELECT dni, nombre,apellido, curso, division  FROM usuarios');
         //hago una consulta SQL, y el resultado 
         // se lo asigno a la variable query
        $retorno = [];

        $i = 0;
        if(!empty($query)){
        foreach($query as $fila){
            $retorno[$i] = $fila;
            $i++;
        }
       
        return $retorno;
     }
   }
   
	function ejecutarQuery($consulta)	
    {
       $conn = conectar();
       $resultado = mysqli_query($conn,$consulta);
       if (mysqli_query($conn,$consulta)){
        echo "<br>Operación realizada";
        }
       else
       {
         echo "Error: ".mysqli_error($conn);
       }
       return $resultado;
    }
    
    function login($consulta)	
    {
       $conn = conectar();
       $resultado = mysqli_query($conn,$consulta);
       $cantidad = mysqli_num_rows($resultado);
      
       if ($cantidad>0){
        echo "<br>usuario existente";
        return mysqli_fetch_all($resultado,MYSQLI_ASSOC);
        }
       else
       {
         echo "Usuario no existe";
         return 0;
       }
       
    }

   function agregarUsuario($dni, $nombre, $apellido, $curso, $division){
       
       $consulta ="INSERT INTO `usuarios` (`dni`, `nombre`, `apellido`, `curso`, `division`) VALUES ('$dni', '$nombre', '$apellido', '$curso', '$division')";
			
		
		;
		
			
		
			$resultado = ejecutarQuery($consulta);
			
	}
		
		function modificar($dni, $nombre, $apellido, $curso, $division){
			
					
		}
		
		function eliminar($dni){
			
		
			
		}
		
		function get_usuario($dni)
		{
			$sql = "SELECT * FROM vehiculos WHERE dni='$dni' LIMIT 1";
			

			return $row;
		}

?>
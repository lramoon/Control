<?php
 

	EliminarEmpleado($_GET['user']);

	function EliminarEmpleado($user)
	{
        $host_db = "localhost";
        $user_db = "root";
        $pass_db = "";
        $db_name = "control";
        $tbl_name = "usuario_e";

             $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

            if ($conexion->connect_error) {
                    die("La conexion falló: " . $conexion->connect_error);
                 }

		$sentencia="DELETE FROM $tbl_name WHERE user='".$user."' ";
        
        $result = $conexion->query($sentencia);
      
    
          if ($conexion->query($sentencia) === TRUE) {

        echo "<script>
        alert('Usuario Eliminado Exitosamente');
        location.href='../Usuario/MostrarConsulta.php';
        </script>";
        }
        
        else {
        echo "Error al eliminar el usuario." . $sentencia . "<br>" . $conexion->error; 
        }
           
        
    }

?>
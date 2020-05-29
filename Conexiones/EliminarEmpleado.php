<?php
 

	EliminarEmpleado($_GET['Cedula']);

	function EliminarEmpleado($Cedula)
	{
        $host_db = "localhost";
        $user_db = "root";
        $pass_db = "";
        $db_name = "control";
        $tbl_name = "empleado";

             $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

            if ($conexion->connect_error) {
                    die("La conexion falló: " . $conexion->connect_error);
                 }

		$sentencia="DELETE FROM empleado WHERE Cedula='".$Cedula."' ";
        
        $result = $conexion->query($sentencia);
      
    
          if ($conexion->query($sentencia) === TRUE) {

        echo "<script>
        alert('Empleado Eliminado Exitosamente');
        location.href='../Usuario/MostrarConsulta.php';
        </script>";
        }
        
        else {
        echo "Error al eliminar el empleado." . $sentencia . "<br>" . $conexion->error; 
        }
           
        
    }

?>
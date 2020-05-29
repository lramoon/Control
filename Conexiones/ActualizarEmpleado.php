<!--En construccion-->
<?php


ModificarProducto($_POST['Nombre'], $_POST['Apellido'], $_POST['Cargo'], $_POST['FechaIngreso'], $_POST['Cedula']);

function ModificarProducto($Nombre, $Apellido, $Cargo, $FechaIngreso, $Cedula)
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
        $sentencia="UPDATE empleado SET Nombre='".$Nombre."', Apellido= '".$Apellido."', Cargo='".$Cargo."', FechaIngreso= '".$FechaIngreso."' WHERE Cedula='".$Cedula."' ";
        
        if ($conexion->query($sentencia) === TRUE) {

            echo "<script>
            alert('Empleado Modificado Exitosamente');
            location.href='../Usuario/MostrarConsulta.php';
            </script>";
            }
            
            else {
            echo "Error al registrar el empleado." . $sentencia . "<br>" . $conexion->error; 
            }
               
            
	}
mysqli_close($conexion);
?>

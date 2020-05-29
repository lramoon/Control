<?php

 $host_db = "localhost";
 $user_db = "root";
 $pass_db = "";
 $db_name = "control";
 $tbl_name = "asistencia";
 $tbl_name2 = "empleado";
 
 $cedula = $_POST['cedula'];

 $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

 if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}
if(isset($_REQUEST['Entrada']));{
   if(!empty($cedula)){
 $buscarUsuario = "SELECT * FROM $tbl_name2
 WHERE cedula = '$_POST[cedula]' ";

 $result = $conexion->query($buscarUsuario);

 $count = mysqli_num_rows($result);

 if ($count == 1) {
     
 $query = "INSERT INTO asistencia_entrada (Fecha_entrada,cedula)
 VALUES ('$_POST[Fecha_Entrada]','$_POST[cedula]')";

if ($conexion->query($query) === TRUE) {

echo "<script>
alert('Asistencia registrada exitosamente');
location.href='../index.php';
</script>";
}

else {
echo "Error al registrar el empleado." . $query . "<br>" . $conexion->error; 
}
}
 else{

    echo "<script>
    alert('El Empleado No existe en nuestro Bd ): Contacte con su Supervisor');
    location.href='../Control/Asistencia_e.php';
    </script>";

 }
}else
{
   echo "<script>
   alert('Rellena el campo!');
   location.href='../Control/Asistencia_e.php';
   </script>"; 
}
}

 mysqli_close($conexion);
?>

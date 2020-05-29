<?php

 $host_db = "localhost";
 $user_db = "root";
 $pass_db = "";
 $db_name = "control";
 $tbl_name = "empleado";
 
 $Cedula = $_POST['Cedula'];

 $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

 if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

 $buscarUsuario = "SELECT * FROM $tbl_name WHERE Cedula = '$_POST[Cedula]' ";

 $result = $conexion->query($buscarUsuario);

 $count = mysqli_num_rows($result);

 if ($count == 1) {
 echo "<script>
 alert('El empleado ya existe en nuestra base datos! Verifique su cedula!');
 location.href='../Personal/MostrarConsulta.php';
 </script>";
 }
 else{

 $query = "INSERT INTO empleado (Nombre, Apellido, Cedula, Cargo, FechaIngreso)
           VALUES ('$_POST[Nombre]', '$_POST[Apellido]' ,'$_POST[Cedula]' , '$_POST[Cargo]', '$_POST[FechaIngreso]')";

 if ($conexion->query($query) === TRUE) {
 
 echo "<script>
 alert('Se ha registrado exitosamente');
 location.href='../Personal/MostrarConsulta.php';
 </script>";
 }

 else {
 echo "Error al registrar el empleado." . $query . "<br>" . $conexion->error; 
   }
 }
 mysqli_close($conexion);
?>

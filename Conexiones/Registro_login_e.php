<?php

$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$db_name = "control";
$tbl_name = "usuario_e";

$User = $_POST['user'];
$password = $_POST['password'];

 $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

 if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

 $buscarUsuario = "SELECT * FROM $tbl_name WHERE user = '$_POST[user]' ";

 $result = $conexion->query($buscarUsuario);

 $count = mysqli_num_rows($result);

 if ($count == 1) {
 echo "<script>
 alert('El empleado ya existe en nuestra base datos! Verifique su cedula!');
 location.href='../Usuario/consultar.php';
 </script>";
 }
 else{
  $password = password_hash($password, 1);
 $query = "INSERT INTO usuario_e (user, Correo, password)
           VALUES ('$_POST[user]', '$_POST[Correo]' ,'$password')";

 if ($resultado = $conexion->query($query) === TRUE) {
 
 echo "<script>
 alert('Se ha registrado con exito');
 location.href='../Control/Asistencia.php';
 </script>";
 }

 else {
 echo "Error al registrar el empleado." . $query . "<br>" . $conexion->error; 
   }
 }
 mysqli_close($conexion);
?>
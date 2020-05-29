<?php
session_start();

$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$db_name = "control";
$tbl_name = "usuario_e";

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
    die("La conexion falló: " . $conexion->connect_error);
   }
   
   $usuario = $_POST['user'];
   $password = $_POST['password'];
    
   $sql = "SELECT * FROM $tbl_name WHERE user = '$usuario' LIMIT 1 ";
   
   $result = $conexion->query($sql);

   $row = mysqli_fetch_array($result); 
     if(password_verify($password,$row['password'])){
   if ($row > 0) {   
    
      $_SESSION['usuario']=$usuario;
       echo "<script>
         alert('Bienvenido $usuario');
         location.href='../Control/inicioE.php';
       </script>";   
    }
     }
    else { 
      echo "<script>
         alert('Usted no es un empleado. Ingrese nuevamente su Usuario y Contraseña');
         location.href='../login/login_e.php';
       </script>";
    }
    mysqli_close($conexion); 
    ?>
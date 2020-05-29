<?php
include ('../Cabecera/header_a.html');
session_start();
$usuario=$_SESSION['usuario'];

//mostrar error en el registro
if(!isset($usuario)){
  header("location: ../login/login_a.php");
}
//Comprobamos si esta definida la sesión 'tiempo'.
else if(isset($_SESSION['tiempo']) ) {

//Tiempo en segundos para dar vida a la sesión.
  $inactivo = 75;//1.25min en este caso.

  //Calculamos tiempo de vida inactivo.
  $vida_session = time() - $_SESSION['tiempo'];

  //Compraración para redirigir página, si la vida de sesión sea mayor a el tiempo insertado en inactivo.
  if($vida_session > $inactivo)
  {
  //Removemos sesión.
  session_unset();
  //Destruimos sesión.
      session_destroy();              
  //Redirigimos pagina.
  header("location: ../index.php");

  exit(); 
  }
} else {
//Activamos sesion tiempo.
$_SESSION['tiempo'] = time();
}

?>
<div>
<br>    
<br>
                    <form  method="" action="">
                    <fieldset class="CFormulario"><legend><h2 style='color:white; background-color:rgba(0,0,0,0.3);'>Empleado</h2></legend>
                    <table style="margin: auto; width: 800px; border-collapse: separate; border-spacing: 10px 5px;">
  		                <thead>
  		                	<th>User</th>
                        <th>Correo</th>
  	                    </thead>

<?php


$consulta=ConsultarProducto($_POST['user']);

  function ConsultarProducto($user)
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
      
     $buscarUsuario = "SELECT * FROM $tbl_name WHERE user = '".$user."'";

      $result = $conexion->query($buscarUsuario);

      $filas = mysqli_fetch_array($result);
      
        if ($filas>0) {
        echo "<tr>";
        echo "<td style='color:white; background-color:rgba(0,0,0,0.5);'>"; echo $filas["user"]; echo "</td>";
        echo "<td style='color:white; background-color:rgba(0,0,0,0.5);'>"; echo $filas['Correo']; echo "</td>";
      echo "</tr>";
                  } else{
                    echo"<script>
                    alert('El usuario no se encuentra en nuestra Base de Datos');
                    location.href='MostrarConsulta.php';
                  </script>";
                  }
        
      }
    
?>
 </table>
 </fieldset>
 </form>
 <a href="MostrarConsulta.php"><button class="btn">Volver</button></a>


</div>

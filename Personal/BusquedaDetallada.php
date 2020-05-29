<?php
include ('../Cabecera/header_a.html');
session_start();
$usuario=$_SESSION['usuario'];

//Mostrar eror en el registro
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
  		                	<th style='color:white; background-color:rgba(0,0,0,0.5);'>Cedula</th>
                            <th style='color:white; background-color:rgba(0,0,0,0.5);'>Nombre</th>
                            <th style='color:white; background-color:rgba(0,0,0,0.5);'>Apellido</th>
                            <th style='color:white; background-color:rgba(0,0,0,0.5);'>Cargo</th>
  		                	<th style='color:white; background-color:rgba(0,0,0,0.5);'>Fecha Ingreso</th>
  	                    </thead>

<?php


$consulta=ConsultarProducto($_POST['cedula']);

  function ConsultarProducto($cedula)
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
      if(!empty($cedula)){
     $buscarUsuario = "SELECT * FROM $tbl_name WHERE Cedula = '".$cedula."'";

      $result = $conexion->query($buscarUsuario);
      
      while($filas = mysqli_fetch_array($result))
      {
        echo "<tr>";
        echo "<td style='color:white; background-color:rgba(0,0,0,0.5);'>"; echo $filas["Cedula"]; echo "</td>";
        echo "<td style='color:white; background-color:rgba(0,0,0,0.5);'>"; echo $filas['Nombre']; echo "</td>";
        echo "<td style='color:white; background-color:rgba(0,0,0,0.5);'>"; echo $filas['Apellido']; echo "</td>";
        echo "<td style='color:white; background-color:rgba(0,0,0,0.5);'>"; echo $filas['Cargo']; echo "</td>";
        echo "<td style='color:white; background-color:rgba(0,0,0,0.5);'>"; echo $filas['FechaIngreso']; echo "</td>";
        echo "<td>  <a href='ActualizarPersonal.php?Cedula=".$filas['Cedula']."'> <button type='button' class='btn-Act'>Modificar</button> </a> </td>";
          echo "<td> <a href='../Conexiones/EliminarEmpleado.php?Cedula=".$filas['Cedula']."'><button type='button' class='btn-Act'>Eliminar</button></a> </td>";
      echo "</tr>";
        
      }
      
    }else{
      echo "<script>
      alert('Debe rellenar el campo!');
      location.href='MostrarConsulta.php';
    </script>";
    }

    }

?>

</table>
</fieldset>
</form>
<a href="MostrarConsulta.php"><button class="btn">Atras</button></a>



                    
</div>
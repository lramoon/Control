<?php
include ('../Cabecera/header_a.html');
session_start();
$usuario=$_SESSION['usuario'];
?>
<title>Reporte de Asistencia</title>
 <br>
 <br>
                 <h1 style="color:white; background-color:rgba(0,0,0,0.5);"> Consulta Reporte de Asistencia </h1>
<div>
<br>
                    <form  method="" action="">
                    <fieldset class="CFormulario"><legend><h2 style="color:white; background-color:rgba(0,0,0,0.3);">Asistencia Del Empleado</h2></legend>
                    <table style="margin: auto; width: 800px; border-collapse: separate; border-spacing: 10px 5px;">
  		                <thead>
  		                	<th style="color:white; background-color:rgba(0,0,0,0.3);">Cedula</th>
  		                	<th style="color:white; background-color:rgba(0,0,0,0.3);">Fecha Ingreso</th>
                            <th style="color:white; background-color:rgba(0,0,0,0.3);">Fecha Salida</th>
  	                    </thead>
                    
                    

<?php

$consulta=ConsultarProducto($_POST['Fecha']);

  function ConsultarProducto($Fecha)
  {
    $host_db = "localhost";
    $user_db = "root";
    $pass_db = "";
    $db_name = "control";
    $tbl_name = "asistencia_entrada";
    $tbl_name2 = "asistencia_salida";

      $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);
      
      if ($conexion->connect_error) {
      die("La conexion falló: " . $conexion->connect_error);
      }
      
     $buscarUsuario = "SELECT AEn.cedula, AEn.Fecha_entrada, ASa.Fecha_salida FROM $tbl_name AEn  
                    INNER JOIN $tbl_name2 ASa  ON AEn.id = ASa.id WHERE AEn.fecha_entrada LIKE '%".$Fecha."%'";

      $result = $conexion->query($buscarUsuario);
      
       
      while($filas = mysqli_fetch_array($result))
      {
        echo "<tr>";
        echo "<td style='color:white; background-color:rgba(0,0,0,0.3);'>"; echo $filas["cedula"]; echo "</td>";
        echo "<td style='color:white; background-color:rgba(0,0,0,0.5);'>"; echo $filas['Fecha_entrada']; echo "</td>";
        echo "<td style='color:white; background-color:rgba(0,0,0,0.5);'>"; echo $filas['Fecha_salida']; echo "</td>";
        
        echo "</tr>";
        
      
      }
       
      echo "<td> <a href='../generarPDF/generaTres.php?Fecha=".$Fecha."'><button class='btn' type='button' class='btn-Act'>Generar Reporte</button></a> </td>";  
    }

?>
</table>
</fieldset>
 </form>
<br>
 <a href="generarReporte.php"> <button class="btn"> ATRAS </button></a>


                    <!--mostrar error en el registro-->
                    <?php 
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
</div>
<footer></footer>

<?php
session_start();
$usuario=$_SESSION['usuario'];
include ('../Cabecera/header_e.html');
?>
<!--inicio contenido-->
<div>
                 
                
                    <form  method="post" action="MostrarConsulta.php">
                    <fieldset class="CFormulario"><legend><h2 style="color:white; background-color:rgba(0,0,0,0.5);">Asistencia De Empleados</h2></legend>                                                
                        <div class="Formulario">
                            <div class="input-group">
                                    <table style="margin: auto; width: 800px; border-collapse: separate; border-spacing: 10px 5px;">
  		                                <thead>
  		                	                <th style="color:white; background-color:rgba(0,0,0,0.5);">Cedula</th>
  		                	                <th style="color:white; background-color:rgba(0,0,0,0.5);">Asistencia De Entrada</th>
  		                	                <th style="color:white; background-color:rgba(0,0,0,0.5);">Asistencia De Salida</th>                                            
                                          </thead>
                                          
    <?php
      $host_db = "localhost";
      $user_db = "root";
      $pass_db = "";
      $db_name = "control";
      $tbl_name = "asistencia_entrada";
      $tbl_name2 = "asistencia_salida";

      date_default_timezone_set('America/Caracas');
      $fecha_actual=date("y-m-d");

      $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);
      
      if ($conexion->connect_error) {
      die("La conexion falló: " . $conexion->connect_error);
      }
      
     $buscarUsuario = "SELECT AEn.cedula, AEn.Fecha_entrada, ASa.Fecha_salida FROM $tbl_name AEn
                    INNER JOIN $tbl_name2 ASa ON AEn.id = ASa.id WHERE AEn.Fecha_entrada LIKE '%".$fecha_actual."%' ";
      

      $result = $conexion->query($buscarUsuario);
      
      

      while($filas = mysqli_fetch_array($result))
      {
        
        echo "<tr>";
          echo "<td style='color:white; background-color:rgba(0,0,0,0.5);'>"; echo $filas['cedula']; echo "</td>";
          echo "<td style='color:white; background-color:rgba(0,0,0,0.5);'>"; echo $filas['Fecha_entrada']; echo "</td>";
          echo "<td style='color:white; background-color:rgba(0,0,0,0.5);'>"; echo $filas['Fecha_salida']; echo "</td>";
          
        echo "</tr>";
        
      }
        
    ?>
  	</table>
                                <div class="input-group-append">
                                    <br>
                                    
                                </div>                                                                                                                                
                            </div>
                        </div>
                    </fieldset>
                    </form>
                    <!--mostrar error en el registro-->
                    <?php 

                    if(!isset($usuario)){
                        header("location: ../login/login_e.php");
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
                              header("Location:../index.php");
      
                              exit(); 
                              }
      } else {
      //Activamos sesion tiempo.
      $_SESSION['tiempo'] = time();
      }
                        ?>
</div>
    <!--Fin de contenido-->
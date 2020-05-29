<?php
session_start();
$usuario=$_SESSION['usuario'];
include ('../Cabecera/header_a.html');

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
  header('location:../index.php');
  exit(); 
  }
} else {
//Activamos sesion tiempo.
$_SESSION['tiempo'] = time();
}
?>
<!--inicio contenido-->
<div>
<div>
                 <br>
                 <form id="Buscar" action="../Control/MostrarAsistencia.php"  method="post">
                    <label for="cedula"> <h2 style="color:white; background-color:rgba(0,0,0,0.3);">Buscar</h2> (<span id="req-cedula" class="requisites <?php echo $cedula ?>"> Ejemplo de cedula v-123456789 </span>): <input class="<?php echo $cedula ?>" value="" name="cedula" id="cedula" type="text" placeholder="Introduzca su Cedula" required autofocus> </label>
                    <button class="btn" type="submit">Buscar</button> </a>
                    </form>
                    
                    <form action="../generarPDF/generaDos.php?usuario='.$filas['usuario'].'">
                    <button class="btn" type="submit">Generar Reporte</button> </a>
                    </form>
                    
</div>
                
                    <form  method="post" action="MostrarConsulta.php">
                    <fieldset class="CFormulario"><legend><h2  style="color:white; background-color:rgba(0,0,0,0.3);">Asistencia De Empleados</h2></legend>                                                
                        <div class="Formulario">
                            <div class="input-group">
                                    <table style="margin: auto; width: 800px; border-collapse: separate; border-spacing: 10px 5px;">
  		                                <thead>
  		                	                <th style="color:white; background-color:rgba(0,0,0,0.3);">Cedula</th>
  		                	                <th style="color:white; background-color:rgba(0,0,0,0.3);">Asistencia De Entrada</th>
  		                	                <th style="color:white; background-color:rgba(0,0,0,0.3);">Asistencia De Salida</th>                                            
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
          echo "<td style='color:white; background-color:rgba(0,0,0,0.3);'>"; echo "<h3 style='color:white'>"; echo $filas['cedula'];        echo "</h3>";  echo "</td>";
          echo "<td style='color:white; background-color:rgba(0,0,0,0.3);'>"; echo "<h3 style='color:white'>"; echo $filas['Fecha_entrada']; echo "</h3>";  echo "</td>";
          echo "<td style='color:white; background-color:rgba(0,0,0,0.3);'>"; echo "<h3 style='color:white'>"; echo $filas['Fecha_salida'];  echo "</h3>";  echo "</td>";
          
        echo "</tr>";
        
      }
        
    ?>
  	</table>
                                <div class="input-group-append">
                                    
                                </div>                                                                                                                                
                            </div>
                        </div>
                    </fieldset>
                    </form>
                    <a href="../Control/Asistencia.php"><button class="btn">ATRAS</button></a>
                    <!-- <br>
                    <a href="../Usuario/MostrarConsulta.php/?Cedula=<?php $_GET['Cedula']?>"><button class="btn btn-primary" type="submit"> Consultar    </button></a>-->
                    <!--mostrar error en el registro-->
                    <?php 
                       
                        ?>
</div>
    <!--Fin de contenido-->
    <footer>  
    <script src="../JS/jquery.js"></script>
    <script src="../jS/search.js"></script>
    </footer>
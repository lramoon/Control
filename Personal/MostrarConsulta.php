<?php
session_start();
$usuario=$_SESSION['usuario'];
include ('../Cabecera/header_a.html');
?>

<!--inicio contenido-->
<div>
                  <div>
                 <br>
                 <form id="Buscar" action="BusquedaDetallada.php"  method="post">
                    <label for="cedula"> <h2 style="color:white; background-color:rgba(0,0,0,0.3);">Buscar</h2>(<span id="req-cedula" class="requisites <?php echo $cedula ?>"> Ejemplo de cedula v-123456789 </span>): <input class="<?php echo $cedula ?>" value="" name="cedula" id="cedula" type="text" placeholder="Introduzca Cedula" required autofocus> </label>
                    <button class="btn" type="submit">Buscar</button> </a>
                    </form>
                </div>

                <form  method="" action="">
                    <fieldset class="CFormulario"><legend><h2 style='color:white; background-color:rgba(0,0,0,0.3);'>Empleados</h2></legend>
                    <table style="margin: auto; width: 800px; border-collapse: separate; border-spacing: 10px 5px;">
  		                <thead>
  		                	<th style='color:white; background-color:rgba(0,0,0,0.5);'>Cedula</th>
  		                	<th style='color:white; background-color:rgba(0,0,0,0.5);'>Nombre</th>
  		                	<th style='color:white; background-color:rgba(0,0,0,0.5);'>Apellido</th>
  		                	<th style='color:white; background-color:rgba(0,0,0,0.5);'>Cargo</th>
                            <th style='color:white; background-color:rgba(0,0,0,0.5);'>Fecha Ingreso</th>
  	                    </thead>
  		
  		
  		<?php
      $host_db = "localhost";
      $user_db = "root";
      $pass_db = "";
      $db_name = "control";
      $tbl_name = "empleado";
      
      $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);
      
      if ($conexion->connect_error) {
      die("La conexion falló: " . $conexion->connect_error);
      }
      
      $buscarUsuario = "SELECT * FROM $tbl_name";
      
      $result = $conexion->query($buscarUsuario);
      
      $count = mysqli_num_rows($result);
      
      while($filas = mysqli_fetch_array($result))
      {
        
        echo "<tr>";
          echo "<td style='color:white; background-color:rgba(0,0,0,0.5);'>"; echo $filas['Cedula']; echo "</td>";
          echo "<td style='color:white; background-color:rgba(0,0,0,0.5);'>"; echo $filas['Nombre']; echo "</td>";
          echo "<td style='color:white; background-color:rgba(0,0,0,0.5);'>"; echo $filas['Apellido']; echo "</td>";
          echo "<td style='color:white; background-color:rgba(0,0,0,0.5);'>"; echo $filas['Cargo']; echo "</td>";
          echo "<td style='color:white; background-color:rgba(0,0,0,0.5);'>"; echo $filas['FechaIngreso']; echo "</td>";
          echo "<td>  <a href='ActualizarPersonal.php?Cedula=".$filas['Cedula']."'> <button type='button' class='btn-Act'>Modificar</button> </a> </td>";
          echo "<td> <a href='../Conexiones/EliminarEmpleado.php?Cedula=".$filas['Cedula']."'><button type='button' class='btn-Act'>Eliminar</button></a> </td>";
        echo "</tr>";
        
      }
        
      ?>
  	</table>
                    <br>
                    
                </fieldset>
                </form>
                <?php ?>
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
<footer>
<script src="../JS/jquery.js"></script>
<script src="../jS/search.js"></script>
</footer>
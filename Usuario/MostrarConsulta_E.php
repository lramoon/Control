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

<!--inicio contenido Administrador-->
<div>
<div>
                 <br>
                 <form id="Buscar" action="BusquedaDetalladaAdm.php"  method="post">
                    <label for="cedula"> <h2 style='color:white; background-color:rgba(0,0,0,0.5);'>Buscar Adm</h2> (<span id="req-user" class="requisites <?php echo $user ?>"> Introduzca su nombre de Usuario </span>): <input  class="<?php echo $user ?>" value="" name="user" id="user" type="text" placeholder="Introduzca su usuario"> </label>
                    <button class="btn" type="submit">Buscar</button> </a>
                    </form>
                </div>

                <form  method="" action="">
                    <fieldset class="CFormulario"><legend><h2 style='color:white; background-color:rgba(0,0,0,0.5);'>Usuarios Administradores</h2></legend>
                    <table style="margin: auto; width: 800px; border-collapse: separate; border-spacing: 10px 5px;">
  		                <thead>
  		                	<th style='color:white; background-color:rgba(0,0,0,0.5);'>Usuario</th>
  		                	<th style='color:white; background-color:rgba(0,0,0,0.5);'>Correo</th>
  		                	<th style='display:none'>Contraseña</th>
  	                    </thead>
                    
  		<?php
      $host_db = "localhost";
      $user_db = "root";
      $pass_db = "";
      $db_name = "control";
      $tbl_name2 = "usuario_a";
      
      $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);
      
      if ($conexion->connect_error) {
      die("La conexion falló: " . $conexion->connect_error);
      }
      
      $buscarUsuario = "SELECT * FROM $tbl_name2";
      
      $result = $conexion->query($buscarUsuario);
      
      $count = mysqli_num_rows($result);
      
      while($filas = mysqli_fetch_array($result))
      {
        
        echo "<tr>";
          echo "<td style='color:white; background-color:rgba(0,0,0,0.5);'>"; echo $filas['user']; echo "</td>";
          echo "<td style='color:white; background-color:rgba(0,0,0,0.5);'>"; echo $filas['Correo']; echo "</td>";
          echo "<td style='display:none'>"; echo $filas['password']; echo "</td>";
          echo "<td>  <a href='Actualizar.php?user=".$filas['user']."'> <button type='button' class='btn-Act'>Modificar</button> </a> </td>";
          echo "<td> <a href='../Conexiones/EliminarAdministrador.php?user=".$filas['user']."'><button type='button' class='btn-Act'>Eliminar</button></a> </td>";
        echo "</tr>";
        
      }
        
      ?>
  	</table>
                    
                    
                </fieldset>
                </form>
                <br>
                   <a href="MostrarConsulta.php"><button type="submit" class="btn">Volver</button></a>
  		
                 
</div>
<!--Fin de contenido-->
<footer>  
<script src="../JS/jquery.js"></script>
<script src="../JS/searchUser.js"></script>
</footer>
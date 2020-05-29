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

$consulta=ConsultarProducto($_GET['user']);

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

    $buscarUsuario="SELECT * FROM $tbl_name WHERE user ='".$user."' ";
    $result = $conexion->query($buscarUsuario);
      
    $count = mysqli_num_rows($result);
    $filas=mysqli_fetch_array($result);
    return [
      $filas['user'],
      $filas['Correo'],
      $filas['password']
    ];

  }


?>

<div>
                 <div>
                    <h1>Consultar empleado</h1>
                </div>
                
                    <form  method="post" action="../Conexiones/ActualizarEmpleado.php">
                        <div class="Formulario">
                            <div class="input-group">
                            <input type="hidden" name="Cedula" id="Cedula" value="<?php echo $_GET['Cedula']?> ">

                            <label for="user">Usuario <input type="text" name="user" class="form-control" id="user" placeholder="Usuario" value="<?php echo $consulta[0] ?>" ></label>
                            
                            <label for="correo">Correo <input type="text" name="correo" class="form-control" id="correo" placeholder="Correo" value="<?php echo $consulta[1] ?>" ></label>
                            
                            <label for="password">Contraseña <input type="text" name="password" class="form-control" id="password" placeholder="Password" value="<?php echo $consulta[2] ?>" ></label>
  		
                            <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Guardar</button>
                                </div>
                            </div>
                        </div>
    
                    </form>
                    
</div>
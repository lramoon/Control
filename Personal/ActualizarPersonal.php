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

$consulta=ConsultarProducto($_GET['Cedula']);

  function ConsultarProducto($Cedula_empleado)
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

    $buscarUsuario="SELECT * FROM empleado WHERE Cedula='".$Cedula_empleado."' ";
    $result = $conexion->query($buscarUsuario);
      
    $count = mysqli_num_rows($result);
    $filas=mysqli_fetch_array($result);
    return [
      $filas['Nombre'],
      $filas['Apellido'],
      $filas['Cargo'],
      $filas['FechaIngreso']
    ];

  }


?>

<div>
                 <div>
                    <h1 style='color:white; background-color:rgba(0,0,0,0.3);'>Modificar Personal</h1>
                </div>
                
                    <form  method="post" action="../Conexiones/ActualizarEmpleado.php">
                        <div class="Formulario">
                            <div class="input-group">
                            <input type="hidden" name="Cedula" id="Cedula" value="<?php echo $_GET['Cedula']?> ">

                            <label for="Nombre">Nombre <input type="text" name="Nombre" class="form-control" id="nombre" placeholder="Nombre del empleado" value="<?php echo $consulta[0] ?>" ></label>
                            
                            <label for="Apellido">apellido <input type="text" name="Apellido" class="form-control" id="apellido" placeholder="Apellido del empleado" value="<?php echo $consulta[1] ?>" ></label>
                            
                            <label for="FechaIngreso">Fecha ingreso <input type="date" name="FechaIngreso" class="form-control" id="fecha" placeholder="01/01/2000" value="<?php echo $consulta[3] ?>" ></label>
                            
                            <label for="Cargo">Cargo <input type="text" name="Cargo" class="form-control" id="cargo" placeholder="Cargo" value="<?php echo $consulta[2] ?>" ></label>
  		
                            <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Guardar</button>
                                </div>
                            </div>
                        </div>
    
                    </form>
                    <a href="MostrarConsulta.php"><button class="btn"> Atras </button></a>
                    
</div>
<?php
session_start();
$usuario=$_SESSION['usuario'];
include ('../Cabecera/header_a.html');

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
    header("Location:../index.php");

    exit(); 
    }
} else {
//Activamos sesion tiempo.
$_SESSION['tiempo'] = time();
}

?>

<!--inicio contenido-->
<div>
                <h1 style="color:white; background-color:rgba(0,0,0,0.5);" class="title text-center">Nuevo empleado</h1>
                <div class="scroll">
                <form id="Formulario"  method="post" action="../Conexiones/empleados.php">
                    <fieldset class="CFormulario"><legend><h2 style="color:white; background-color:rgba(0,0,0,0.5);">Registro</h2></legend>
                            
                            <label for="Nombre"><h3 style="color:white; background-color:rgba(0,0,0,0.5);">Nombre</h3>              (<span id="req-Nombre" class="requisites <?php echo $Nombre ?>">A-z, mínimo 4 caracteres</span>):<input type="text" name="Nombre" class="form-control <?php echo $Nombre ?>" value="" id="Nombre" placeholder="Nombre del empleado" required></label>
                            
                            <label for="Apellido"><h3 style="color:white; background-color:rgba(0,0,0,0.5);">apellido</h3>          (<span id="req-Apellido" class="requisites <?php echo $Apellido ?>">A-z, mínimo 4 caracteres</span>):<input type="text" name="Apellido" class="form-control <?php echo $Apellido ?>" value="" id="Apellido" placeholder="Apellido del empleado" required></label>
                            
                            <label for="Cedula"><h3 style="color:white; background-color:rgba(0,0,0,0.5);">Cedula</h3>              (<span id="req-Cedula" class="requisites <?php echo $Cedula ?>">A-z, mínimo 4 caracteres</span>):<input type="text" name="Cedula" class="form-control <?php echo $Cedula ?>" value="" id="Cedula" placeholder="v-xxxxxxx" required></label>

                            <label for="Celular"><h3 style="color:white; background-color:rgba(0,0,0,0.5);">Celular</h3>            (<span id="req-Celular" class="requisites <?php echo $Celular ?>">(Codigo,seguido de su numero Ej 04241111111,0414000000), Solo caracteres numericos</span>):<input type="text" name="Celular" class="form-control <?php echo $Celular ?>" value="" id="Celular" placeholder="04241111111" required></label>
                            
                            <label for="FechaIngreso"><h3 style="color:white; background-color:rgba(0,0,0,0.5);">Fecha ingreso</h3> (<span id="req-FechaIngreso" class="requisites <?php echo $FechaIngreso ?>">Ingresar Fecha De ingreso</span>):<input type="date" name="FechaIngreso" class="form-control <?php echo $FechaIngreso ?>" value="" id="FechaIngreso" placeholder="01/01/2000" required></label>
                            
                            <label for="Cargo"><h3 style="color:white; background-color:rgba(0,0,0,0.5);">Cargo</h3>                (<span id="req-Cargo" class="requisites <?php echo $Cargo ?>">A-z, mínimo 4 caracteres</span>):<input type="text" name="Cargo" class="form-control <?php echo $Cargo ?>" value="" id="Cargo" placeholder="Cargo" required></label>
                    
                    <button type="submit" class="btn">Agregar</button>
                    
                </fieldset>
                </form>
                <a href="MostrarConsulta.php"><button class="btn">ATRAS</button></a>
                 
                    </div>
</div>
<!--Fin de contenido-->
<footer>
<script src="../JS/jquery.js"></script>
<script src="../jS/registerEmp.js"></script>
</footer>
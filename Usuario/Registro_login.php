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

<!--inicio contenido-->
<div>
                <h1 class="title text-center">Nuevo Administrador</h1>
                <div class="scroll">
                <form id="Formulario" method="post" action="../Conexiones/Registro_login.php">
                    <fieldset class="CFormulario"><legend><h2 style="color:white; background-color:rgba(0,0,0,0.5);">Registro Administrador</h2></legend>
                            
                            <label for="user"><h3 style="color:white; background-color:rgba(0,0,0,0.5);">Nombre de usuario</h3>       (<span id="req-username" class="requisites <?php echo $user ?>">A-z, mínimo 4 caracteres</span>): <input type="text" name="user" class="form-control <?php echo $user ?>" value="" id="user"  placeholder="Nombre del usuario" required></label>
                            
                            <label for="Correo"><h3 style="color:white; background-color:rgba(0,0,0,0.5);">Correo</h3>                (<span id="req-email" class="requisites <?php echo $Correo ?>">A-z, mínimo 4 caracteres</span>): <input type="email" name="Correo" class="form-control <?php echo $Correo ?>" value="" id="Correo"  placeholder="Correo" required></label>

                            <label for="Celular"><h3 style="color:white; background-color:rgba(0,0,0,0.5);">Telefono Celular</h3>     (<span id="req-celular" class="requisites <?php echo $Celular ?>">(Codigo,seguido de su numero Ej 04241111111,0414000000), Solo caracteres numericos</span>): <input type="text" name="Celular" class="form-control <?php echo $Celular ?>" value="" id="Celular" placeholder="Numero de Telefono" required></label>

                            <label for="Password"><h3 style="color:white; background-color:rgba(0,0,0,0.5);">Contraseña</h3>          (<span id="req-password" class="requisites <?php echo $password ?>">A-z, mínimo 4 caracteres</span>): <input type="password" name="password" class="form-control <?php echo $password ?>" value="" id="password" placeholder="Contraseña" required></label>
                            
                            <label for="Password"><h3 style="color:white; background-color:rgba(0,0,0,0.5);">Confirmar Contraseña</h3>(<span id="req-password2" class="requisites <?php echo $password2 ?>">El contenido de este campo debe coincidor con el campo contraseña</span>): <input type="password" name="password2" class="form-control <?php echo $password2 ?>" value="" id="password2" placeholder="Confirmar Contraseña" required></label>

                    
                            <button type="submit" class="btn"><h3>Registrar</h3></button>
                </fieldset>
                
                </form>
                <a href="registro.php"> <button class="btn"><h3>Atras</h3></button></a>
                 
                
                
                    </div>
</div>
<!--Fin de contenido-->
<footer>    
<script src="../JS/jquery.js"></script>
<script src="../jS/register.js"></script>
</footer>
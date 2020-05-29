<?php 
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
    header("Location:../index.php");

    exit(); 
    }
} else {
//Activamos sesion tiempo.
$_SESSION['tiempo'] = time();
}
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="Description" content="Inicio del loggin">
    <link  rel="stylesheet" href="../css/estilos.css">
    <title>Regitro empleado</title>
</head>
<body>
    <main>
        <div class="error">
        </div>
        <section>
            <div>
                <div>
                    <div>
                        <div>
                            <img src="">
                        </div>
                        <div>
                            <div>
                                <h4 style="color:white; background-color:rgba(0,0,0,0.5);">¿Que Desea Registrar?</h4>
                                <form method="post" action="">
                                   <fieldset class="Formulario">
                                    <div>
                                                <button class="btn" type="submit" value="Ingresar">
                                               <a style="text-decoration:none; color:white; font-size:20px; font-weight:bold;" href="Registro_login_e.php"> Empleado </a> 
                                            </button>
                                            </div>
                                    <div>
                                        <button class="btn" type="submit" value="Ingresar" >
										<a style="text-decoration:none; color:white; font-size:20px; font-weight:bold;" href="Registro_login.php">Administrador</a>
									</button>
                                    </div>
                                    <br>
                                    <hr>
                                    <!--
                                    <div>
                                        ¿No tienes una cuenta? <a href="registro.php">Crea una aquí</a>
                                    </div>
-->                                 </fieldset> 
                                </form>
                                <a href="../Control/Inicio.php"><button class="btn">ir a inicio</button></a>
                            </div>
                        </div>
                        <div class="footer">
                            Copyright &copy; Ramon Web  2019
                        </div>
                    </div>
                </div>
            </div>
        </section>

        
    </main>
    

    <footer>    
    <script src="../js/registerEmp.js"></script>
    </footer>
</body>

</html>
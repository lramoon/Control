<?php
session_start();
$usuario=$_SESSION['usuario'];
include ('../Cabecera/header_e.html');

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
?>
<body>
<title>Inicio</title>
    <main>
        <section>
                            <div>
                                <h4 style="color:white; background-color:rgba(0,0,0,0.5);">JONTEX C.A Web</h4>
                             
                            </div>
                            <div>
                                <h2 style="color:White; background-color:rgba(0,0,0,0.5);">Bienvenido <?php echo $usuario ; ?> </h2>
                            </div>
                      
        </section>
        </main>
                            
    <footer>    
        <!-- Script para redireccionar cada boton-->  
        <script type="text/javascript">
        function enviar(destino){
            document.Form.action= destino;
            document.Form.submit();
        }
        </script>
        <script src="js/login.js"></script>

    <a style="color:white; background-color:rgba(0,0,0,0.3);"> Copyright &copy; Ramon Web  2019</a>
    </footer>
</body>
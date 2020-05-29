<?php
session_start();
$usuario=$_SESSION['usuario'];
include ('../Cabecera/header_a.html');
date_default_timezone_set('America/Caracas');


$fecha_actual=date("y-m-d H:i:s");
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
    header('Location:../index.php');

    exit(); 
    }
} else {
//Activamos sesion tiempo.
$_SESSION['tiempo'] = time();
}
?>
<title>Asistencia</title>
    <main>
        <section>
            
                
                    
                        
                            
                                <h4 style="color:white; background-color:rgba(0,0,0,0.5);">JONTEX C.A Web</h4>
                                <form id="Formulario" method="post" name="Form">
                                   <fieldset class="Formulario">
                                    <div>
                                        <label for="cedula"><h3 style="color:white; background-color:rgba(0,0,0,0.3);">Cedula</h3> (<span id="req-cedula" class="requisites <?php echo $cedula ?>"> Ejemplo de cedula v-123456789 </span>):<input class="Usuario <?php echo $cedula ?>" value="" id="cedula" type="text" name="cedula" required autofocus></label>
                                    </div>
                                    <div>
                                        <label for="Fecha_Entrada"><h3 style="color:white; background-color:rgba(0,0,0,0.3);">Fecha Entrada</h3><input class="Usuario" id="Fecha_Entrada" type="datetime" name="Fecha_Entrada" value="<?=$fecha_actual?>" required autofocus readonly></label>
                                    </div>
                                        <div>
                                        <button id="Oh" class="btn" type="submit" value="Entrada" onclick="enviar('../Conexiones/asistenciaEntrada.php')">
										Entrada
                                    </button>
                                    <button id="Oh" class="btn" type="submit" value="Salida" onclick="enviar('../Conexiones/asistenciaSalida.php')">
										Salida
									</button>
                                    </div>
                                    <br>
                                    <hr>
                                    <!--
                                    <div>
                                        ¿No tienes una cuenta? <a href="registro.php">Crea una aquí</a>
                                    </div>-->                                 
                                    </fieldset> 
                                </form>
                            
                        
                        <div class="footer">
                           <a style="color:white; background-color:rgba(0,0,0,0.3);"></a> Copyright &copy; Ramon Web  2019
                        </div>
                    
                
            
        </section>
    
                            
        
    </main>
    <footer>   
        <script src="../JS/jquery.js"></script>
        <script src="../JS/search.js"></script> 
        <!-- Script para redireccionar cada boton-->  
        <script type="text/javascript">
        function enviar(destino){
            document.Form.action= destino;
            document.Form.submit();
        }
        </script>
        
    </footer>


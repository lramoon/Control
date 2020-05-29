<?php
session_start();
$usuario=$_SESSION['usuario'];
include ('../Cabecera/header_e.html');
date_default_timezone_set('America/Caracas');

$feacha_actual=date("Y-m-d H:i:s");


//Mostrar eror en el registro
if(!isset($usuario)){
    header("location: ../login/login_e.php");
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
 <title>Asistencia</title>
    <main>
        <div class="error">
        </div>
        <section>
            <div>
                <div>
                    <div>
                        <div">
                            <img src="">
                        </div>
                        <div>
                            <div>
                                <h4 style="color:white; background-color:rgba(0,0,0,0.5);">JONTEX C.A Web</h4>
                                <form id="Formulario" method="post" name="Form">
                                   <fieldset class="Formulario">
                                    <div>
                                        <label for="cedula"><h3 style="color:white; background-color:rgba(0,0,0,0.5);">Cedula</h3> (<span id="req-cedula" class="requisites <?php echo $cedula ?>"> Ejemplo de cedula v-123456789 </span>):<input class="Usuario <?php echo $cedula ?>" value="" id="cedula" type="text" name="cedula"  required ></label>
                                    </div>
                                    <div>
                                        <label for="Fecha_Entrada"><h3 style="color:white; background-color:rgba(0,0,0,0.5);">Fecha Entrada</h3><input class="Usuario" id="Fecha_Entrada" type="datetime" name="Fecha_Entrada" value="<?=$feacha_actual?>" required autofocus readonly></label>
                                    </div>
                                        <div>
                                        <button class="btn" type="button" value="Entrada" onclick="enviar('../Conexiones/asistenciaEntrada_E.php')">
										Entrada
                                    </button>
                                    <button class="btn" type="button" value="Salida" onclick="enviar('../Conexiones/asistenciaSalida_E.php')">
										Salida
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
    <!-- Script para redireccionar cada boton-->  
    <script src="../JS/jquery.js"></script>
        <script src="../JS/search.js"></script>
        <script type="text/javascript">
        function enviar(destino){
            document.Form.action= destino;
            document.Form.submit();
        }
        </script>
    </footer>

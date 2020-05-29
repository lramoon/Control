<?php 
 session_start();
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="Description" content="Inicio del loggin">
    <link  rel="stylesheet" href="css/estilos.css">
    <title>Inicio JONTEX C.A Web</title>
</head>
<body>

<div class="error">
    <main>
        
        
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
                                <form method="post" action="">
                                   <fieldset class="Formulario">
                                    <div>
                                                <button class="btn" type="submit" value="Ingresar">
                                               <a style="text-decoration:none; color:white; font-size:20px; font-weight:bold;" href="login/login_e.php"> Empleado </a> 
                                            </button>
                                            </div>
                                    <div>
                                        <button class="btn" type="submit" value="Ingresar" >
										<a style="text-decoration:none; color:white; font-size:20px; font-weight:bold;" href="login/login_a.php">Administrador</a>
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
                        <div  class="footer">
                           <a style="color:white;background-color:rgba(0,0,0,0.3);"> Copyright &copy; Ramon Web  2019</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        
    </main>
    <footer>    
        <script src="js/login.js"></script>
    </footer>
    </div>
</body>

</html>
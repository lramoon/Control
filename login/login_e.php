<?php include_once('../Conexiones/config.php'); 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link  rel="stylesheet" href="../css/estilos.css">
    <title>Login Usuario</title>
</head>
<body>
    <main>
        <section>
                            <div>
                                <h4 style="color:white; background-color:rgba(0,0,0,0.5);">JONTEX C.A Web</h4>
                                
                                <form id="Formulario" method="post" action="../Conexiones/usuario_e.php">
                                   <fieldset class="Formulario">
                                    <div>
                                        <label for="user"> <h5 style="color:white; background-color:rgba(0,0,0,0.5);">Usuario</h5>  (<span id="req-user" class="requisites <?php echo $usuario ?>">A-z, mínimo 4 caracteres</span>): <input class="Usuario <?php echo $usuario ?>" value=""  id="user" type="text" name="user" required autofocus></label>
                                    </div>

                                    <div>
                                        <label for="password"> <h5 style="color:white; background-color:rgba(0,0,0,0.5);">Contraseña</h5> (<span id="req-password" class="requisites <?php echo $password ?>">Mínimo 5 caracteres, máximo 12 caracteres, letras y números</span>): <input type="password" class="Contraseña  <?php echo $password ?>" value="" id="password" type="text"  name="password" required data-eye></label>								
                                    </div>

                                        <div>
                                        <button class="btn" type="submit" id="Ingresar" name="Ingresar" value="Ingresar">
										Ingresar
									</button>
                                    </div>
                                    <div>
                                      <a style="color:white; background-color:rgba(0,0,0,0.3);">Soy Administrador   <a style="color:white; background-color:rgba(0,0,0,0.3);" href="login_a.php">Accede aquí</a></a>
                                    </div>
                                    <br>
                                    <hr>
                                    <!--
                                    <div>
                                        ¿No tienes una cuenta? <a href="registro.php">Crea una aquí</a>
                                    </div> -->                                
                                 </fieldset> 
                                </form>

                            </div>
                        <div class="footer">
                            <a  style="color:white; background-color:rgba(0,0,0,0.3);"> Copyright &copy; Ramon Web  2019</a>
                        </div>                                           
        </section> 
    </main>
</body>
<footer>
<script type="text/Javascript" src="../JS/jquery.js"></script>
<script type="text/Javascript" src="../JS/login.js"></script>
</footer>
</html>
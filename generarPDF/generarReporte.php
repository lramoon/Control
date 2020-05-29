<?php
session_start();
$usuario=$_SESSION['usuario'];
include ('../Cabecera/header_a.html');
?>
<!--inicio contenido-->
<div>
<form id="Buscar" action="MostrarBusqueda.php"  method="post">
                    <label for="Fecha"> <h2 style="color:white; background-color:rgba(0,0,0,0.3);">Buscar</h2> (<span id="req-cedula" class="requisites <?php echo $Fecha ?>"> Seleccione la fecha para generar el reporte </span>): <input class="<?php echo $Fecha ?>" value="" name="Fecha" id="Fecha" type="date" required autofocus> </label>
                    <button class="btn" type="submit">Buscar</button> </a>
</form>




</div>
<!--En construccion-->
<?php

$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$db_name = "control";
$tbl_name = "empleado";

$cedula = $_POST['Cedula'];



$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
die("La conexion falló: " . $conexion->connect_error);
}

$buscarUsuario = "SELECT * FROM $tbl_name
WHERE Cedula = '$_POST[Cedula]' ";

$result = $conexion->query($buscarUsuario);

$count = mysqli_num_rows($result);

if ($count == 1) {

     // comienza un bucle que leerá todos los registros existentes

while($row = mysqli_fetch_array($result)) {

// $row es un array con todos los campos existentes en la tabla

echo "<hr>";

echo "<label>Nombre:<input value=".$row['Nombre']."> </label><br>";

echo "<label>Apellido:<input value=".$row['Apellido']."> </label><br>";

echo "<label>Cedula:<input value=".$row['Cedula']."> </label><br>";

echo "<label>Fecha de Ingreso:<input value=".$row['FechaIngreso']."> </label><br>";

echo "<label>Cargo:<input value=".$row['Cargo']."> </label><br>";   

echo "<hr>";

} // fin del bucle de instrucciones

mysqli_free_result($result); // Liberamos los registros
   
}
else{


echo "<br />". "El Nombre del empleado no existe en nuestra base de datos." . "<br />";

echo "<a href='inicio_a.php?secc=agregarempleado'>Por favor registrela.</a>";

}
mysqli_close($conexion);
?>

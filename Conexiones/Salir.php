
<?php
session_start();
session_destroy();
header("location: ../index.php");
exit();

mysqli_close($conexion); 
?>
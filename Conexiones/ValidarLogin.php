<?php

if(isset($_POST['Ingresar'])){
$usuario = $_POST['user'];
$password = $_POST['password'];

if(empty($usuario)){
    echo"<script>
    alert('Debe rellenar el campo Usuario');
    </script>";
}else{
    if(strlen($usuario)>15){
        echo"<script>
        alert('Su Nombre de usuario Es Invalido');
        </script>";
    }

}

if(empty($password)){
    echo"<script>
    alert('Debe rellenar el campo Contraseña');
    </script>";
}
    
}
?>
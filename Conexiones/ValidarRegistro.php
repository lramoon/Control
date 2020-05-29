<?php

if(isset($_POST['submit'])){
$User = $_POST['User'];
$Correo = $_POST['Correo'];
$Celular = $_POST['Celular'];
$Password = $_POST['Password'];
$PasswordConfir = $_POST['PasswordConfir'];

if(empty($User)){
    echo"<script>
    alert('Debe rellenar el campo Usuario');
    </script>";
}else{
    if(strlen($User)>15){
        echo"<script>
        alert('Su Nombre de usuario Es Muy Largo');
        </script>";
    }

}

if(empty($Correo)){
    echo"<script>
    alert('Debe rellenar el campo Correo');
    </script>";
}else{
    if(!filter_var($Correo, FILTER_VALIDATE_EMAIL)){
        echo"<script>
        alert('Coloque un email valido');
        </script>";
    }

}

if(empty($Celular)){
    echo"<script>
    alert('Debe rellenar el campo Celular');
    </script>";
}else{
    if(!is_numeric($Celular)){
        echo"<script>
        alert('El campo celular solo debe contener numeros');
        </script>";
    }
}

if(empty($Password)){
    echo"<script>
    alert('Debe rellenar el campo Contraseña');
    </script>";
}

if(empty($PasswordConfir)){
    echo"<script>
    alert('Debe rellenar el campo Contraseña');
    </script>";
}

if($Password!=$PasswordConfir){
    echo"<script>
    alert('Los Campos De Contraseña Deben Coincidir');
    </script>";
}

}

?>
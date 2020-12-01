<?php
require('../model/user.php');

// $_POST = json_decode(file_get_contents("php://input"), true);
$operacion=$_POST['option'];
$objusuario= new usuario();

switch($operacion)
{
    case 'access':
       $user = $_POST['user'];
       $pass = $_POST['password'];
       $array=$objusuario->autenticacion($user,$pass);
       if($array[0]==[0])
                {
                    echo '0';
                }
                else{
                    session_start();
                    $_SESSION['ingreso']      = 'YES';
                    $_SESSION['ID']           = $array[0];
                    $_SESSION['nombre']       = $array[3];
                    $_SESSION['AP']           = $array[4];
                    $_SESSION['AM']           = $array[5];
                    $_SESSION['rol']          = $array[9];
                    echo "1";
                }
    break;

    case 'accessP':
        $user = $_POST['user'];
        $pass = $_POST['password'];
        $array=$objusuario->autenticacionP($user,$pass);
        if($array[0]==[0])
                 {
                     echo '0';
                 }
                 else{
                     session_start();
                     $_SESSION['ingreso']      = 'YES';
                     $_SESSION['ID']           = $array[0];
                     $_SESSION['nombre']       = $array[3];
                     $_SESSION['AP']           = $array[4];
                     $_SESSION['AM']           = $array[5];
                     $_SESSION['rol']          = $array[9];
                     echo "1";
                 }
     break;

    case 'register':
        echo $objusuario->registrarusuario($_POST['nombre'],$_POST['appaterno'],$_POST['apmaterno'],$_POST['correo'],$_POST['usuario'],$_POST['password']);
    break;

}
?>
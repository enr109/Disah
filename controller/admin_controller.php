<?php
require('../model/admin.php');

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
                    echo "1";
                }
    break;

}
?>
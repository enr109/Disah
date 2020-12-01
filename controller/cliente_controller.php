<?php 
require('../model/clientes.php');

$operacion=$_POST['option'];
$objclientes = new clientes();

switch($operacion){
    case 'insert':
        echo $objclientes->insert($_POST['user'],$_POST['password'],$_POST['nombre'],$_POST['ap'],$_POST['am'],$_POST['domi'],$_POST['tel'],$_POST['correo']);
    break;

    case 'showdata':
        echo $objclientes->getDatos($_POST['id']);
    break;
    case 'delete':
        echo $objclientes->delete($_POST['id']);
    break;
    case 'update':
        echo $objclientes->update($_POST['id'],$_POST['user'],$_POST['password'],$_POST['nombre'],$_POST['ap'],$_POST['am'],$_POST['domi'],$_POST['tel'],$_POST['correo']);
    break;
}
?>
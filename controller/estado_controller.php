<?php 
require('../model/estado.php');

$operacion=$_POST['option'];
$objproductores = new productores();

switch($operacion){
    case 'insert':
        echo $objproductores->insert($_POST['user'],$_POST['password'],$_POST['nombre'],$_POST['ap'],$_POST['am'],$_POST['domi'],$_POST['tel'],$_POST['correo']);
    break;

    case 'showdata':
        echo $objproductores->getDatos($_POST['id']);
    break;
    case 'showdataen':
        echo $objproductores->getDatosen($_POST['id']);
    break;
    case 'update':
        echo $objproductores->update($_POST['id'],$_POST['user'],$_POST['password'],$_POST['nombre'],$_POST['ap'],$_POST['am'],$_POST['domi'],$_POST['tel'],$_POST['correo']);
    break;
}
?>
<?php
require('../model/entrada.php');

$operacion=$_POST['option'];
$objentrada = new entrada();

switch($operacion){
    case 'insert':
        echo $objentrada->insert($_POST['idtipopago'],$_POST['idtipoentrega'],$_POST['idproductor'],$_POST['cantidad'],$_POST['idproducto'],$_POST['total']);
    break;

    case 'showdata':
        echo $objentrada->getDatos();
    break;
    case 'delete':
        echo $objentrada->delete($_POST['id']);
    break;
    case 'update':
        echo $objentrada->update($_POST['id'],$_POST['user'],$_POST['password'],$_POST['nombre'],$_POST['ap'],$_POST['am'],$_POST['domi'],$_POST['tel'],$_POST['correo']);
    break;
}
?>

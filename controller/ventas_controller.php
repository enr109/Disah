<?php
require('../model/ventas.php');

$operacion=$_POST['option'];
$objventas = new ventas();

switch($operacion){
    case 'insert':
        echo $objventas->insert($_POST['idtipopago'],$_POST['idtipoentrega'],$_POST['idcliente'],$_POST['cantidad'],$_POST['lugarentrega'],$_POST['idproducto'],$_POST['total']);
    break;

    case 'showdata':
        echo $objventas->getDatos();
    break;
    case 'delete':
        echo $objventas->delete($_POST['id']);
    break;
    case 'update':
        echo $objventas->update($_POST['id'],$_POST['user'],$_POST['password'],$_POST['nombre'],$_POST['ap'],$_POST['am'],$_POST['domi'],$_POST['tel'],$_POST['correo']);
    break;
}
?>

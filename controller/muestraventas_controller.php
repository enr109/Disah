<?php 
require('../model/muestrasventas.php');

$operacion=$_POST['option'];
$objproductores = new ventas();

switch($operacion){
    case 'showdata':
        echo $objproductores->getDatosVenta();
    break;
    case 'updateVenta':
        echo $objproductores->updateVentas($_POST['id'],$_POST['estado']);
    break;
    case 'showcombo':
        echo $objproductores->getDatosCombo();
    break;
    case 'showentradas':
        echo $objproductores->getDatosEntrada();
    break;
    case 'updateEntradas':
        echo $objproductores->updateEntradas($_POST['id'],$_POST['estado']);
    break;
}
?>
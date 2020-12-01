<?php 
require('../model/pago.php');

$operacion=$_POST['option'];
$objpago = new pago();

switch($operacion){
    
    case 'showdata':
        echo $objpago->getDatos();
    break;
    
}
?>
<?php 
require('../model/entrega.php');

$operacion=$_POST['option'];
$objentrega = new entregas();

switch($operacion){
    
    case 'showdata':
        echo $objentrega->getDatos();
    break;
    
}
?>
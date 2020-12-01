<?php
require('../model/productos.php');

$operacion=$_POST['option'];
$objusuario= new image();

switch($operacion)
{
    case 'insert':
        $imagenJPG=$_FILES['imagenJPG'];
        $filenameJPG=$_FILES['imagenJPG']['name'];
        $sourcepatJPG=$_FILES["imagenJPG"]['tmp_name']; 
        //--------------------------------------------
        if($_FILES['imagenJPG']["type"]=="image/jpeg" || ($_FILES['imagenJPG']["type"]=="image/jpg")){
            echo $objusuario->insert($_POST['nombre'],$_POST['precio'],$imagenJPG,$filenameJPG,$sourcepatJPG);
        }else{
            echo 'Las extenciones no son las perminitas';
        }
    break;

    case 'update':
        $imagenJPG=$_FILES['imagenJPG'];
        $filenameJPG=$_FILES['imagenJPG']['name'];
        $sourcepatJPG=$_FILES["imagenJPG"]['tmp_name']; 
        if($_FILES['imagenJPG']["type"]=="image/jpeg" || ($_FILES['imagenJPG']["type"]=="image/jpg")){
            echo $objusuario->update($_POST['Id'],$_POST['nombre'],$_POST['precio'],$imagenJPG,$filenameJPG,$sourcepatJPG);
        }else{
            echo 'Las extenciones no son las perminitas';
        }
    break;

    case 'delete':
       echo $objusuario->delete($_POST['id']);
    break;
    
    case 'showdata':
        echo $objusuario->getdatos();
    break;

}
?>
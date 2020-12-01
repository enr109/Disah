<?php
require('conexion2.php');
    class pago{
        function getDatos(){
            $connect = new conexion();
            $sql="SELECT * FROM `tbltipopago`";
            mysqli_set_charset($connect->conectarbd(),"utf8");
            if(!$select=mysqli_query($connect->conectarbd(),$sql)) die("Error al consultar");
            $pag=array();

            while($row=mysqli_fetch_array($select)){
                $id=$row['idpago'];
                $nompago=$row['vchnompago'];
                

                $pag[] = array(
                    'Id'=>$id,
                    'npago'=>$nompago
                );
            }
            $encabezado=array( "pago" => $pag);
            $json_string = json_encode($encabezado,JSON_UNESCAPED_UNICODE);
            return $json_string;
        }
    }
?>
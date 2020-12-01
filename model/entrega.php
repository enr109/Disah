<?php
require('conexion2.php');
    class entregas{
        function getDatos(){
            $connect = new conexion();
            $sql="SELECT * FROM `tbltipoentrega`";
            mysqli_set_charset($connect->conectarbd(),"utf8");
            if(!$select=mysqli_query($connect->conectarbd(),$sql)) die("Error al consultar");
            $entre=array();

            while($row=mysqli_fetch_array($select)){
                $id=$row['idtientrega'];
                $entrega=$row['vchentrega'];
                

                $entre[] = array(
                    'Id'=>$id,
                    'entr'=>$entrega
                );
            }
            $encabezado=array( "Entrega" => $entre);
            $json_string = json_encode($encabezado,JSON_UNESCAPED_UNICODE);
            return $json_string;
        }
    }
?>
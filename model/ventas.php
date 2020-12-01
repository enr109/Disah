<?php
require('conexion2.php');
    class ventas{
        function insert($idpago,$identrega,$idcliente,$cantidad,$lugarentre,$idproducto,$total){
            $connect = new conexion();
            $idestado=1;
            $sql="INSERT INTO `tblventas`(`idtipopago`,`idtipoentrega`,`idcliente`,`cantidad`,`lugarentrega`,`idproducto`,`idestado`,`totalven`)VALUES('$idpago','$identrega','$idcliente','$cantidad','$lugarentre','$idproducto','$idestado','$total');";
            $insert=mysqli_query($connect->conectarbd(),$sql);
            return $insert;
        }

        function update($id,$pago,$entrega,$cliente){
            $connect = new conexion();
            $sql="UPDATE `bdproyectopro`.`tblventas` SET `idtipopago` = '$pago', `idtipoentrega` = '$entrega', `idcliente` = '$cliente' WHERE `idventas`='$id';";
            $update=mysqli_query($connect->conectarbd(),$sql);
            return $update;
        }

        public function delete($id){
            $connect = new conexion();
            $sql="DELETE FROM `bdproyectopro`.`tblventas` WHERE `idventas` = '$id';";
            $delete=mysqli_query($connect->conectarbd(),$sql);
            return $delete;
        }

        function getDatos(){
            $connect = new conexion();
            $sql="SELECT
            `tblventas`.`idventas`
            , `tblventas`.`totalven`
            , `tblventas`.`fecha`
            , `tblcliente`.`clinombre`
            , `tblcliente`.`cliap`
            , `tblcliente`.`cliam`
            , `tbltipoentrega`.`vchentrega`
            , `tbltipopago`.`vchnompago`
        FROM
            `bdproyectopro`.`tblventas`
            INNER JOIN `bdproyectopro`.`tblcliente`
                ON (`tblventas`.`idcliente` = `tblcliente`.`idcliente`)
            INNER JOIN `bdproyectopro`.`tbltipoentrega`
                ON (`tblventas`.`idtipoentrega` = `tbltipoentrega`.`idtientrega`)
            INNER JOIN `bdproyectopro`.`tbltipopago`
                ON (`tblventas`.`idtipopago` = `tbltipopago`.`idpago`)";
            mysqli_set_charset($connect->conectarbd(),"utf8");
            if(!$select=mysqli_query($connect->conectarbd(),$sql)) die("Error al consultar");
            $ventas=array();

            while($row=mysqli_fetch_array($select)){
                $id=$row['idventas'];
                $total=$row['totalven'];
                $fecha=$row['fecha'];
                $nom=$row['clinombre'];
                $ap=$row['cliap'];
                $am=$row['cliam'];
                $entrega=$row['vchentrega'];
                $pago=$row['vchnompago'];


                $ventas[] = array(
                    'Id'=>$id,
                    'total'=>$total,
                    'fec'=>$fecha,
                    'nombre'=>$nom,
                    'ap'=>$ap,
                    'am'=>$am,
                    'entrega'=>$entrega,
                    'pago'=>$pago
                );
            }
            $encabezado=array( "Ventas" => $ventas);
            $json_string = json_encode($encabezado,JSON_UNESCAPED_UNICODE);
            return $json_string;
        }
    }
?>

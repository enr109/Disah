<?php
require('conexion2.php');
    class productores{
        function insert($user,$password,$nombre,$ap,$am,$domi,$tel,$coreo){
            $connect = new conexion();
            $tipo="Productor";
            $encripsha1 = sha1($password);
            $sql="INSERT INTO `tblproductor`
            (`prousuario`,`propassword`,`pronombre`,`proap`,`proam`,`prodomicilio`,`protelefono`,`procorreo`,`Tipo`)VALUES('$user','$password','$nombre','$ap','$am','$domi','$tel','$coreo','$tipo');";
            $insert=mysqli_query($connect->conectarbd(),$sql);
            return $insert;
        }

        function update($id,$user,$password,$nombre,$ap,$am,$domi,$tel,$coreo){
            $connect = new conexion();
            $encripsha1 = sha1($password);
            $sql="UPDATE `bdproyectopro`.`tblproductor` SET `prousuario` = '$user', `propassword` = '$encripsha1', `pronombre` = '$nombre', `proap` = '$ap', `proam` = '$am', `prodomicilio` = '$domi', `protelefono` = '$tel', `procorreo` = '$coreo' WHERE `idproductor`='$id';";
            $update=mysqli_query($connect->conectarbd(),$sql);
            return $update;
        }

        public function delete($id){
            $connect = new conexion();
            $sql="DELETE FROM `bdproyectopro`.`tblproductor` WHERE `idproductor` = '$id';";
            $delete=mysqli_query($connect->conectarbd(),$sql);
            return $delete;
        }

        function getDatos($id){
            $connect = new conexion();
            $sql="SELECT
            `tblventas`.`idventas`
            , `tblventas`.`totalven`
            , `tblventas`.`fecha`
            , `tblproductos`.`Proprecio`
            , `tblventas`.`cantidad`
            , `tblventas`.`lugarentrega`
            , `tblproductos`.`vchnomproduct`
            , `tblestado`.`vchestado`
            , `tbltipopago`.`vchnompago`
        FROM
            `tblventas`
            INNER JOIN `tblcliente` 
                ON (`tblventas`.`idcliente` = `tblcliente`.`idcliente`)
            INNER JOIN `tblestado` 
                ON (`tblventas`.`idestado` = `tblestado`.`idestado`)
            INNER JOIN `tblproductos` 
                ON (`tblventas`.`idproducto` = `tblproductos`.`idproductos`)
            INNER JOIN `tbltipopago` 
                ON (`tblventas`.`idtipopago` = `tbltipopago`.`idpago`) WHERE `idventas` = '$id';";
            mysqli_set_charset($connect->conectarbd(),"utf8");
            if(!$select=mysqli_query($connect->conectarbd(),$sql)) die("Error al consultar");
            $productos=array();

            while($row=mysqli_fetch_array($select)){
                $id=$row['idventas'];
                $total=$row['totalven'];
                $fecha=$row['fecha'];
                $precio=$row['Proprecio'];
                $cantidad=$row['cantidad'];
                $lugar=$row['lugarentrega'];
                $nom=$row['vchnomproduct'];
                $estado=$row['vchestado'];
                $nompago=$row['vchnompago'];

                $productos[] = array(
                    'Id'=>$id,
                    'total'=>$total,
                    'fecha'=>$fecha,
                    'nombre'=>$nom,
                    'precio'=>$precio,
                    'cantidad'=>$cantidad,
                    'lugar'=>$lugar,
                    'estado'=>$estado,
                    'pago'=>$nompago
                );
            }
            $encabezado=array( "productos" => $productos);
            $json_string = json_encode($encabezado,JSON_UNESCAPED_UNICODE);
            return $json_string;
        }

        function getDatosen($id){
            $connect = new conexion();
            $sql="SELECT
            `tblentrada`.`identrada`
            , `tblentrada`.`vchfecha`
            , `tbltipopago`.`vchnompago`
            , `tblentrada`.`totalen`
            , `tblproductos`.`Proprecio`
            , `tblentrada`.`cantidad`
            , `tblproductos`.`vchnomproduct`
            , `tblestado`.`vchestado`
        FROM
            `tblentrada`
            INNER JOIN `tbltipopago` 
                ON (`tblentrada`.`idtipopago` = `tbltipopago`.`idpago`)
            INNER JOIN `tblproductos` 
                ON (`tblentrada`.`idproducto` = `tblproductos`.`idproductos`)
            INNER JOIN `tblestado` 
                ON (`tblentrada`.`idestado` = `tblestado`.`idestado`) WHERE `identrada` = '$id';";
            mysqli_set_charset($connect->conectarbd(),"utf8");
            if(!$select=mysqli_query($connect->conectarbd(),$sql)) die("Error al consultar");
            $productos=array();

            while($row=mysqli_fetch_array($select)){
                $id=$row['identrada'];
                $total=$row['totalen'];
                $fecha=$row['vchfecha'];
                $precio=$row['Proprecio'];
                $cantidad=$row['cantidad'];
                $nom=$row['vchnomproduct'];
                $estado=$row['vchestado'];
                $nompago=$row['vchnompago'];

                $productos[] = array(
                    'Id'=>$id,
                    'total'=>$total,
                    'fecha'=>$fecha,
                    'nombre'=>$nom,
                    'precio'=>$precio,
                    'cantidad'=>$cantidad,
                    'estado'=>$estado,
                    'pago'=>$nompago
                );
            }
            $encabezado=array( "productos" => $productos);
            $json_string = json_encode($encabezado,JSON_UNESCAPED_UNICODE);
            return $json_string;
        }
    }
?>

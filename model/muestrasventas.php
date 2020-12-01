<?php
require('conexion2.php');
    class ventas{

        function updateVentas($id,$estado){
            $connect = new conexion();
            $sql="UPDATE `tblventas` SET `idestado` = '$estado' WHERE `idventas`='$id';";
            $update=mysqli_query($connect->conectarbd(),$sql);
            return $update;
        
        }
        function updateEntradas($id,$estado){
            $connect = new conexion();
            $sql="UPDATE `tblentrada` SET `idestado` = '$estado' WHERE `identrada`='$id';";
            $update=mysqli_query($connect->conectarbd(),$sql);
            return $update;
        }

        function getDatosCombo(){
            $connect = new conexion();
            $sql="SELECT `idestado`,`vchestado` FROM `tblestado`";
            mysqli_set_charset($connect->conectarbd(),"utf8");
            if(!$select=mysqli_query($connect->conectarbd(),$sql)) die("Error al consultar");
            $esta=array();

            while($row=mysqli_fetch_array($select)){
                $id=$row['idestado'];
                $estado=$row['vchestado'];

                $esta[] = array(
                    'Id'=>$id,
                    'estado'=>$estado
                );
            }
            $encabezado=array( "esta" => $esta);
            $json_string = json_encode($encabezado,JSON_UNESCAPED_UNICODE);
            return $json_string;
        }
        function getDatosVenta(){
            $connect = new conexion();
            $sql="SELECT
            `tblventas`.`totalven`
            , `tblventas`.`fecha`
            , `tbltipopago`.`vchnompago`
            , `tbltipoentrega`.`vchentrega`
            , `tblcliente`.`clinombre`
            , `tblcliente`.`cliap`
            , `tblcliente`.`cliam`
            , `tblventas`.`cantidad`
            , `tblventas`.`lugarentrega`
            , `tblproductos`.`vchnomproduct`
            , `tblestado`.`vchestado`
            , `tblventas`.`idventas`
        FROM
            `tblventas`
            INNER JOIN `tblcliente` 
                ON (`tblventas`.`idcliente` = `tblcliente`.`idcliente`)
            INNER JOIN `tblestado` 
                ON (`tblventas`.`idestado` = `tblestado`.`idestado`)
            INNER JOIN `tblproductos` 
                ON (`tblventas`.`idproducto` = `tblproductos`.`idproductos`)
            INNER JOIN `tbltipoentrega` 
                ON (`tblventas`.`idtipoentrega` = `tbltipoentrega`.`idtientrega`)
            INNER JOIN `tbltipopago` 
                ON (`tblventas`.`idtipopago` = `tbltipopago`.`idpago`) ORDER BY `tblventas`.`fecha` DESC";
            mysqli_set_charset($connect->conectarbd(),"utf8");
            if(!$select=mysqli_query($connect->conectarbd(),$sql)) die("Error al consultar");
            $ventas=array();

            while($row=mysqli_fetch_array($select)){
                $id=$row['idventas'];
                $total=$row['totalven'];
                $fecha=$row['fecha'];
                $pago=$row['vchnompago'];
                $entrega=$row['vchentrega'];
                $nombre=$row['clinombre'];
                $ap=$row['cliap'];
                $am=$row['cliam'];
                $cantidad=$row['cantidad'];
                $lugar=$row['lugarentrega'];
                $producto=$row['vchnomproduct'];
                $estado=$row['vchestado'];

                $ventas[] = array(
                    'Id'=>$id,
                    'total'=>$total,
                    'fecha'=>$fecha,
                    'pago'=>$pago,
                    'entrega'=>$entrega,
                    'nom'=>$nombre,
                    'ap'=>$ap,
                    'am'=>$am,
                    'cantida'=>$cantidad,
                    'lugar'=>$lugar,
                    'producto'=>$producto,
                    'estado'=>$estado
                );
            }
            $encabezado=array( "ventas" => $ventas);
            $json_string = json_encode($encabezado,JSON_UNESCAPED_UNICODE);
            return $json_string;
        }

        function getDatosEntrada(){
            $connect = new conexion();
            $sql="SELECT
            `tblentrada`.`identrada`
            , `tblentrada`.`vchfecha`
            , `tblentrada`.`totalen`
            , `tbltipopago`.`vchnompago`
            , `tbltipoentrega`.`vchentrega`
            , `tblproductor`.`pronombre`
            , `tblproductor`.`proap`
            , `tblproductor`.`proam`
            , `tblentrada`.`cantidad`
            , `tblproductos`.`vchnomproduct`
            , `tblestado`.`vchestado`
        FROM
            `tblentrada`
            INNER JOIN `tblestado` 
                ON (`tblentrada`.`idestado` = `tblestado`.`idestado`)
            INNER JOIN `tblproductor` 
                ON (`tblentrada`.`idproductor` = `tblproductor`.`idproductor`)
            INNER JOIN `tblproductos` 
                ON (`tblentrada`.`idproducto` = `tblproductos`.`idproductos`)
            INNER JOIN `tbltipoentrega` 
                ON (`tblentrada`.`identrega` = `tbltipoentrega`.`idtientrega`)
            INNER JOIN `tbltipopago` 
                ON (`tblentrada`.`idtipopago` = `tbltipopago`.`idpago`) ORDER BY `tblentrada`.`vchfecha` DESC";
            mysqli_set_charset($connect->conectarbd(),"utf8");
            if(!$select=mysqli_query($connect->conectarbd(),$sql)) die("Error al consultar");
            $entradas=array();

            while($row=mysqli_fetch_array($select)){
                $id=$row['identrada'];
                $total=$row['totalen'];
                $fecha=$row['vchfecha'];
                $pago=$row['vchnompago'];
                $entrega=$row['vchentrega'];
                $nombre=$row['pronombre'];
                $ap=$row['proap'];
                $am=$row['proam'];
                $cantidad=$row['cantidad'];
                $producto=$row['vchnomproduct'];
                $estado=$row['vchestado'];

                $entradas[] = array(
                    'Id'=>$id,
                    'total'=>$total,
                    'fecha'=>$fecha,
                    'pago'=>$pago,
                    'entrega'=>$entrega,
                    'nom'=>$nombre,
                    'ap'=>$ap,
                    'am'=>$am,
                    'cantida'=>$cantidad,
                    'producto'=>$producto,
                    'estado'=>$estado
                );
            }
            $encabezado=array( "entradas" => $entradas);
            $json_string = json_encode($encabezado,JSON_UNESCAPED_UNICODE);
            return $json_string;
        }
    }
?>
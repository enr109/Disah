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
            $sql="UPDATE `tblproductor` SET `prousuario` = '$user', `propassword` = '$password', `pronombre` = '$nombre', `proap` = '$ap', `proam` = '$am', `prodomicilio` = '$domi', `protelefono` = '$tel', `procorreo` = '$coreo' WHERE `idproductor`='$id';";
            $update=mysqli_query($connect->conectarbd(),$sql);
            return $update;
        }

        public function delete($id){
            $connect = new conexion();
            $sql="DELETE FROM `tblproductor` WHERE `idproductor` = '$id';";
            $delete=mysqli_query($connect->conectarbd(),$sql);
            return $delete;
        }

        function getDatos($id){
            $connect = new conexion();
            $sql="SELECT * FROM tblproductor WHERE `idproductor` = '$id';";
            mysqli_set_charset($connect->conectarbd(),"utf8");
            if(!$select=mysqli_query($connect->conectarbd(),$sql)) die("Error al consultar");
            $productores=array();

            while($row=mysqli_fetch_array($select)){
                $id=$row['idproductor'];
                $user=$row['prousuario'];
                $nom=$row['pronombre'];
                $ap=$row['proap'];
                $am=$row['proam'];
                $domicilio=$row['prodomicilio'];
                $tele=$row['protelefono'];
                $corr=$row['procorreo'];

                $productores[] = array(
                    'Id'=>$id,
                    'user'=>$user,
                    'nombre'=>$nom,
                    'ap'=>$ap,
                    'am'=>$am,
                    'domicilio'=>$domicilio,
                    'tele'=>$tele,
                    'correo'=>$corr
                );
            }
            $encabezado=array( "productores" => $productores);
            $json_string = json_encode($encabezado,JSON_UNESCAPED_UNICODE);
            return $json_string;
        }
    }
?>
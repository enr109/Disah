<?php
require('conexion2.php');
    class clientes{
        function insert($user,$password,$nombre,$ap,$am,$domi,$tel,$coreo){
            $connect = new conexion();
            $tipo="Cliente";
            $encripsha1 = sha1($password);
            $sql="INSERT INTO `tblcliente`
            (`cliusuario`,`clipassword`,`clinombre`,`cliap`,`cliam`,`clidomicilio`,`clitelefono`,`clicorreo`,`Tipo`)VALUES('$user','$encripsha1','$nombre','$ap','$am','$domi','$tel','$coreo','$tipo');";
            $insert=mysqli_query($connect->conectarbd(),$sql);
            return $insert;
        }

        function update($id,$user,$password,$nombre,$ap,$am,$domi,$tel,$coreo){
            $connect = new conexion();
            $encripsha1 = sha1($password);
            $sql="UPDATE `tblcliente` SET `cliusuario` = '$user', `clipassword` = '$encripsha1', `clinombre` = '$nombre', `cliap` = '$ap', `cliam` = '$am', `clidomicilio` = '$domi', `clitelefono` = '$tel', `clicorreo` = '$coreo' WHERE `idcliente`='$id';";
            $update=mysqli_query($connect->conectarbd(),$sql);
            return $update;
        }

        public function delete($id){
            $connect = new conexion();
            $sql="DELETE FROM `tblcliente` WHERE `idcliente` = '$id';";
            $delete=mysqli_query($connect->conectarbd(),$sql);
            return $delete;
        }

        function getDatos($id){
            $connect = new conexion();
            $sql="SELECT * FROM tblcliente WHERE `idcliente` = '$id';";
            mysqli_set_charset($connect->conectarbd(),"utf8");
            if(!$select=mysqli_query($connect->conectarbd(),$sql)) die("Error al consultar");
            $clientes=array();

            while($row=mysqli_fetch_array($select)){
                $id=$row['idcliente'];
                $user=$row['cliusuario'];
                $nom=$row['clinombre'];
                $ap=$row['cliap'];
                $am=$row['cliam'];
                $domicilio=$row['clidomicilio'];
                $tele=$row['clitelefono'];
                $corr=$row['clicorreo'];

                $clientes[] = array(
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
            $encabezado=array( "clientes" => $clientes);
            $json_string = json_encode($encabezado,JSON_UNESCAPED_UNICODE);
            return $json_string;
        }
    }
?>
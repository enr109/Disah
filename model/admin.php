<?php
require('conexion2.php');
    class usuario
    {

        function autenticacion($user,$password){
            $connect=new conexion();
            //  $usuariivalidado =mysql_real_escape_string($user);
            $encripsha1 = sha1($password);
  
            //   $sql = "SELECT * FROM tblusuarios WHERE vchCorreo='{$user}' && vchContrasena='{$password}'"; 
            $sql = "SELECT
            `idempleado`
            , `vchusuario`
            , `vchpassword`
            , `emnombre`
            , `emap`
            , `emam`
            , `emdomicilio`
            , `emtelefono`
            , `emcorreo`
        FROM
        `tblempleados`
             WHERE `vchusuario` = '{$user}' AND `vchpassword` = '{$password}'"; 
              $res = mysqli_query($connect->conectarbd(),$sql);
              if($res->num_rows > 0){
                  $r=$res->fetch_array(); 
              }else{
                  $r[0]=[0];
              }
              return $r;
        }

        

    
        
    }
?>
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
            `idcliente`
            , `cliusuario`
            , `clipassword`
            , `clinombre`
            , `cliap`
            , `cliam`
            , `clidomicilio`
            , `clitelefono`
            , `clicorreo`
            , `Tipo`
            FROM
            `tblcliente`
             WHERE `cliusuario` = '{$user}' AND `clipassword` = '{$encripsha1}'"; 
              $res = mysqli_query($connect->conectarbd(),$sql);
              if($res->num_rows > 0){
                  $r=$res->fetch_array(); 
              }else{
                  $r[0]=[0];
              }
              return $r;
        }

        function autenticacionP($user,$password){
            $connect=new conexion();
            //  $usuariivalidado =mysql_real_escape_string($user);
            $encripsha1 = sha1($password);
  
            //   $sql = "SELECT * FROM tblusuarios WHERE vchCorreo='{$user}' && vchContrasena='{$password}'"; 
            $sql = "SELECT
            `idproductor`
            , `prousuario`
            , `propassword`
            , `pronombre`
            , `proap`
            , `proam`
            , `prodomicilio`
            , `protelefono`
            , `procorreo`
            , `Tipo` 
            FROM 
            `tblproductor`
             WHERE `prousuario` = '{$user}' AND `propassword` = '{$password}'"; 
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
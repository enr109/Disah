<?php   
require('conexion2.php');
class Image{
    public  function insert($nombre,$precio,$imagenJPG,$filenameJPG,$sourcepatJPG){
       $connect=new conexion();
       if($filenameJPG == ""){
         $insert = "no se inserto la foto JPG";
       }else{
         if($imagenJPG["type"]=="image/jpeg" || ($imagenJPG["type"]=="image/jpg")){
           $rutaJPG="../src/img/JPG/".$filenameJPG;
           
           $sql="INSERT INTO `tblproductos`(`vchnomproduct`,`Procosto`,`JPG`)VALUES('$nombre','$precio','$filenameJPG');";

           $insert=mysqli_query($connect->conectarbd(),$sql);
           if($insert){
            @move_uploaded_file($sourcepatJPG,$rutaJPG);
           }else{
             $insert = "<script>alert('Archivo no permitido')</script>";
           }
         }else{
           $insert="el archivo no es valido ";
         }
         return $insert;
       }
    }  

    public function insertImage($imagenJPG,$filenameJPG,$sourcepatJPG){
      $connect = new conexion();
      if($filenameJPG == ""){
        $insertarImagen = "no se inserto la foto JPG"; 
      }else{
        if( $imagenJPG["type"]=="image/jpeg" || ($imagenJPG["type"]=="image/jpg")){
            $sql1="SELECT MAX(idImagen) AS maximo FROM tblimagenes";  
            $result=mysqli_query($connect->conectarbd(),$sql1);
            $data=mysqli_fetch_array($result);
            $idMaximoImagen=$data["maximo"]; 

            $rutaJPG="../src/img/JPG/".$filenameJPG;
            
            $sql="INSERT INTO `tbldescargas` (`PNG`,`JPG`,`fk_Imagen`)
            VALUES ('$filenameJPG','$idMaximoImagen');";

            $insertarImagen=mysqli_query($connect->conectarbd(),$sql);
            if($insertarImagen){
              @move_uploaded_file($sourcepatJPG,$rutaJPG);
            }else{
              $insertarImagen = "<script>alert('Archivo no permitido')</script>";
            }
        }else{
            $insertarImagen="el archivo no es valido ";
        }  
      return $insertarImagen;
    }
  }


    public function update($id,$nombre,$precio,$imagenJPG,$filenameJPG,$sourcepatJPG){
       $connect= new conexion();
       if($filenameJPG == ""){
        $insert = "no se inserto la foto JPG";
      }else{
        if($imagenJPG["type"]=="image/jpeg" || ($imagenJPG["type"]=="image/jpg")){
          $rutaJPG="../src/img/JPG/".$filenameJPG;
          
          $sql="UPDATE `tblproductos` SET `vchnomproduct`= '$nombre', `Procosto` = '$precio', `JPG` = '$filenameJPG' WHERE `idproductos` = '$id';";

          $insert=mysqli_query($connect->conectarbd(),$sql);
          if($insert){
           @move_uploaded_file($sourcepatJPG,$rutaJPG);
          }else{
            $insert = "<script>alert('Archivo no permitido')</script>";
          }
        }else{
          $insert="el archivo no es valido ";
        }
        return $insert;
      }
    }

    public  function delete($id){
       $connect= new conexion();
       $sql="DELETE
       FROM `tblproductos`
       WHERE `idproductos` = '$id';";
       $delete=mysqli_query($connect->conectarbd(),$sql);
       return $delete;
    }

    public  function getdatos(){ 
      $conectar = new conexion();
        $sql="SELECT
        `idproductos`
        , `vchnomproduct`
        , `Proprecio`
        , `Procosto`
        , `existencia`
        , `JPG`
    FROM
        `tblproductos`";  

      mysqli_set_charset($conectar->conectarbd(),"utf8");
      if(!$select=mysqli_query($conectar->conectarbd(),$sql)) die("Error al consultar");
      $producto=array();
       
      while($row=mysqli_fetch_array($select)){
          $id=$row['idproductos'];
          $nombre=$row['vchnomproduct'];
          $precio=$row['Proprecio'];
          $costo=$row['Procosto'];
          $existencia=$row['existencia'];
          $JPG = $row['JPG'];
          
          $producto[] = array(
            'Id'=> $id,
            'nombre'=> $nombre,
            'JPG' => $JPG,
            'precio' => $precio,
            'costo' => $costo,
            'existencia' => $existencia
          );
      }
       
       $encabezado=array("producto"=>$producto);
       $json_string = json_encode($encabezado,JSON_UNESCAPED_UNICODE);
      return $json_string;

    }
}
?>
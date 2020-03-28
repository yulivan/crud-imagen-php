<?php 
/*
*  ELIMINAR PELICULA
*/
include('database.php');

     if(isset($_POST['id'])){
     	 $id = $_POST['id'];
     	 // consulta: buscar ruta de la imagen, concidente con valor $id recivido
     	 $queryruta = "SELECT rutaimagen FROM pelicula WHERE idpelicula = $id ";

     	 $resultruta = mysqli_query($conexion, $queryruta);
         $fila = $resultruta->fetch_assoc();
     	 // echo "Ruta imagen: ".$fila['rutaimagen'];
         // consulta: eliminar fila coincidente con valor $id recivido
     	 $query = "DELETE FROM pelicula WHERE idpelicula = $id";
     	 $result = mysqli_query($conexion, $query);
           // eliminar de carpeta img/ la imagen
     	 unlink($fila['rutaimagen']);

     	 if(!$result){
     	 	die('consulta fallida delete');
     	 }
     	 echo "Pelicula eliminada ";
     }  

 ?>
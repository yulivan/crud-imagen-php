<?php 
/*
*	EDITAR PELICULA EN BD
*/
include('database.php');

$id =  $_POST['id'];
$nombre = $_POST["nombrePeli"];
$descrip = $_POST["descripcion"];
$genero = $_POST["genero"];
$imagen = $_FILES["imagen"];

// CONSULTA: buscar ruta de la imagen, de $id recivido 
$queryruta = "SELECT rutaimagen FROM pelicula WHERE idpelicula = $id ";

$resultruta = mysqli_query($conexion, $queryruta);
$imgactual = $resultruta->fetch_assoc();

// si el campo inputfile imagen no esta vacio
if($imagen["name"] != null){
	// eliminar de carpeta img/ la imagen actual
 	unlink($imgactual['rutaimagen']);
 	// crear una nueva ruta
	$ruta = "img/".md5($imagen["tmp_name"]).".jpg";
	move_uploaded_file($imagen["tmp_name"], $ruta);
}else{
	// si no selecciono ningun archivo, mantener la imagen actual
  $ruta = $imgactual['rutaimagen'];	
}
// consulta: actualizar campos de columna, concidente con $id recivido
$query = "UPDATE pelicula SET titulo = '$nombre' , descripcion = '$descrip', idgenero = '$genero', rutaimagen = '$ruta' WHERE idpelicula = '$id' ";

$result = mysqli_query($conexion, $query);

if(!$result){
	die('Consulta Fallida');
}

echo "Tarea Actualizada ";

 ?>
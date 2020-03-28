<?php 
/*
*	EDITAR PELICULA, buscar fila a editar
*/
include('database.php');

$id = $_POST['id'];
// consulta: buscar todo de pelicula mientras coincida con id buscado
$query = "SELECT *FROM  pelicula WHERE  idpelicula = $id ";
$result = mysqli_query($conexion, $query);
if(!$result){
	die('Error en la consulta');
}
$json = array();
while($row = mysqli_fetch_array($result)){
   $json[] = array(
         'nombrePeli' => $row['titulo'],
         'imagen' => $row['rutaimagen'],
         'descripcion' => $row['descripcion'],
         'genero' => $row['idgenero'],
         'id' => $row['idpelicula']
   );
}

$jsonstring = json_encode($json[0]);
echo $jsonstring;


 ?>
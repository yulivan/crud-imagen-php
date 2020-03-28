<?php 
/*
*  GUARDAR PELICULA
*/
include('database.php');

	$nombre = $_POST["nombrePeli"];
	$descrip = $_POST["descripcion"];
	$genero = $_POST["genero"];
	$imagen = $_FILES["imagen"];
	// formato de imagen permitidos
	$permitidos = array("image/jpg","image/jpeg","image/png");
	// tamaño de imagen
	$limite_kb = 300;
 
	if (in_array($imagen["type"], $permitidos) && $imagen["size"] <= $limite_kb*1024) {
		// echo "podemos insertar";
		// crear ruta donde guardar mi imagen 
		$ruta = "img/".md5($imagen["tmp_name"]).".jpg";

		$sql = "INSERT INTO pelicula() VALUES(null, '$nombre', '$descrip', '$ruta',$genero)";
		if( mysqli_query($conexion, $sql)){
			// mover archivo a la ruta de mi carpeta /img
			move_uploaded_file($imagen["tmp_name"], $ruta);
			echo "Se ha subido la pelicula";
		}else{
			echo "Ocurrio un error al insertar pelicula";
		}
	} else {
		echo "Debe seleccionar una imagen valida";
	}

 ?>
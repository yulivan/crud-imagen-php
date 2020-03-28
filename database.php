<?php 

	$conexion = mysqli_connect(
		"localhost",
		 "root",
		  "",
		  "imagen_php_ajax"
		);
	
	mysqli_set_charset($conexion, "utf8");
	
	if($conexion ->connect_errno)
	{
	    echo "Fallo al conectar".$conexion->connect_errno;

	}
 ?>
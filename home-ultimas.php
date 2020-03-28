<?php 
/*
*  BUSCAR ULTIMAS 10 PELICULAS AGREGADAS
*  Archivo: home.php
*/
include('database.php');
    // consulta: seleciona todo de pelicula ordenado de forma descedente (los ultimos 10 registros)
	 $query = "SELECT * FROM pelicula ORDER BY idpelicula DESC LIMIT 10";

        $result = mysqli_query($conexion, $query);

        if(!$result){
         die('fallo consulta'. mysqli_error($conexion));
        }

        $json = array();
        while($row = mysqli_fetch_array($result)){
            // arreglo lleno de objetos
           $json[] = array(
             'titulo' => $row['titulo'],
             'descripcion' => $row['descripcion'],
             'rutaimagen' => $row['rutaimagen'],
             'idpelicula' => $row['idpelicula']
           );
        }

        $jsonstring =  json_encode($json);
        echo $jsonstring;
 ?>
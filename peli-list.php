<?php 
/*
*  LISTADO TOTAL DE PELICULAS INSERTADAS
*/
include('database.php');

    $jsondata = array();
    $jsondataList = array();

    // valor buscado por input
    $q = $conexion->real_escape_string($_GET['valor']);

    // // CONSULTAS SQL ////
    //total de filas en tabla pelicula
    $myquerytotal = "SELECT COUNT(*) total FROM pelicula";
    // selecciona todo de pelicula ordenado desde el ultimo ingresado
    // con limit y hasta
    $limite = $conexion->real_escape_string($_GET['limit']);
    $hasta =  $conexion->real_escape_string($_GET["offset"]);

    $myquery = "SELECT * FROM pelicula ORDER BY idpelicula DESC LIMIT ".$limite." OFFSET ".$hasta;
            
// ------ consulta total de filas en peliculas -------------------

        // consultas sql, total de filas que concieden con valor de input "q"
        if($_GET['valor'] != ""){

            //selecciona todo de pelicula mientras coincida con valor "q"

            $myquerytotal = "SELECT COUNT(*) total FROM pelicula WHERE 
                     idpelicula LIKE '%".$q."%' OR 
                     titulo LIKE '%".$q."%' OR 
                     descripcion LIKE '%".$q."%'  ";

            $myquery = "SELECT * FROM pelicula WHERE 
                     idpelicula LIKE '%".$q."%' OR 
                     titulo LIKE '%".$q."%' OR 
                     descripcion LIKE '%".$q."%' LIMIT ".$limite." OFFSET ".$hasta;    
                    
        }

        $resultadototal = $conexion->query($myquerytotal);
        
        if(!$resultadototal){
            die('fallo consulta'. mysqli_error($conexion));
        }

        $fila = $resultadototal->fetch_assoc();

        $jsondata['total'] = $fila['total'];
        $jsondata['buscar'] = $q;

// ----- consulta desde hasta paginacion resultados 


        $resultado = $conexion->query($myquery);
        while($fila = $resultado ->fetch_assoc())
        {
            $jsondataperson = array();
            $jsondataperson["idpelicula"] = $fila["idpelicula"];
            $jsondataperson["titulo"] = $fila["titulo"];
            $jsondataperson["descripcion"] = $fila["descripcion"];
            $jsondataperson["rutaimagen"] = $fila["rutaimagen"];

            $jsondataList[]=$jsondataperson;

        }

        $jsondata["lista"] = array_values($jsondataList);

header("Content-type:application/json; charset = utf-8");
echo json_encode($jsondata);
exit();

 ?>
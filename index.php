<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

	   <title>ajax imagen subir</title>
	   <!-- Bootstrap -->
    <link rel="stylesheet"  href="core/css/bootstrap.min.css">
    <!-- My CSS -->
    <link rel="stylesheet" type="text/css" href="css/Style.css">

</head>
<body>
<!-- navegacion -->
  <nav class="navbar navbar-expand-md navbar-light bg-light">
        <div  class="container-fluid" >
            <a class="navbar-brand" href="index.php">
                Peliculas</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" >
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive" >
                <ul  class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="home.php">Mi sitio</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

 
 <!-- ----- cargar imagen ----------- -->
 <div class="container p-4 contenidoform">
  <div class="row">
    <div class="col-md-5">
      <div id="respuesta"></div>
        <div class="card">
          <div class="card-body">
            <form action="" id="insertar-pelicula" enctype="multipart/form-data">
              <!-- ID oculto -->
             <input type="hidden" name="id" id="idpeli">

            <input type="text" name="nombrePeli" id="nombrePeli" placeholder="Ingrese el titulo de la pelicula" required class="form-control">

            <input type="file" name="imagen" id="imagen" class="form-control">

            <textarea name="descripcion" id="descripcion" required class="form-control"></textarea>
            
            <select name="genero" id="genero" required class="form-control">
              <option value="" selected>Seleccione Genero</option>
              <option value="1">Accion</option>
              <option value="2">Terror</option>
              <option value="3">Comedia</option>
              <option value="4">Animada</option>
            </select>
            
            <input type="submit" id="botonform" value="Insertar pelicula" class="btn btn-primary">
            <button class="cancelar btn btn-success">Cancelar</button>  
          
            </form>
          </div>
      </div>
  </div>

 <!-- ------------- TABLA RESULTADOS Y BUSCAR----------- -->
  
  <div class="col-md-6">
    
    <div class="buscador">
      <input type="text" name="busqueda" id="busqueda" placeholder="Buscar pelicula" class="tbuscar"/><span class="searchicon"></span>
    </div>

    <table class="table table-striped">
        <thead>
          <tr> 
            <td>Id</td>
            <td>Name</td>
            <td>Descripcion</td>
            <td>Imagen</td>
            <td>Accion</td>
          </tr>
        </thead>
<!-- table datos ajax -->
        <tbody id="miTabla">  
        </tbody>
        
      </table>
<!-- -- paginacion -- ajax -->
      <div class="block-27">
          <ul class="pagination" id="paginador">
          </ul>
      </div>
  </div>
  </div>	
 </div>

<!-- ----- footer ------- -->

<footer class="text-center">
  <p>App pelicula, PHP, JS, AJAX, MYSQL, CSS </p>
</footer>

<!-- -x---- footer -----x-- -->

<!--  SCRIPTS js -->
  <!-- Bootstrap js JQuery-->
  <script src="core/jquery-3.1.1.min.js"></script>
  <script src="core/js/bootstrap.min.js" ></script>
  <script src="core/js/popper.min.js" ></script>
  <!-- My JS -->
  <script src="js/pagination.js"></script>
  <script src="js/mijs.js"></script> 
</body>
</html>
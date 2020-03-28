<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

	<title>Peliculas php crud</title>

  <!-- BOOTSTRAP -->
  <link rel="stylesheet"  href="core/css/bootstrap.min.css">

  <!-- Carousel Slick  -->
  <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>

  <!-- My CSS -->
	<link rel="stylesheet" type="text/css" href="css/Style.css">

</head>
<body>
<!------------------- PORTADA HEADER -------------->
  <header id="home"> 
      <nav class="nav">
        <a href="home.html" id="logo">Peliculas</a> 
           <div class="overlay">
              <ul class="menuitem">
                <li>Inicio</li>
                <li>Filtro</li>
              </ul>
          </div>
      </nav>
      <div class="container text-center mt-4">
        <h1>CRUD PHP IMAGEN</h1>
        <P>AJAX, Mysql, mysqli, CSS, JavaScript, JQuery, Bootstrap</P>
        <p>Paginacion, Carrusel Imagenes Slick, Buscador imagen, Responsibe</p>
        <a href="index.php" class="btn btn-outline-secondary btn-lg">
                  Nueva Pelicula
                </a>
      </div>
    </header>
<!------------- X PORTADA HEADER X-------------- -->

<!------------- ULTIMAS AGREGADAS ---------------->

<section class="ultimasAgregadas section_gap_bottom">
    <div class="container p-4">
        <h1>Ultimas Agregadas</h1>
        <div id="slick-demo" class="slick-carousel testi_slider">
        </div>
    </div>
</section>
 
<!----- X ------- ULTIMAS AGREGADAS ----- X ------>


<!----------- LISTA DE PELICULAS --------- -->
 <div class="homelista">
   <div class="container"> 
      <div id="homeContent" class="containerHome"></div>

      <div class="block-27">
          <ul class="pagination">
          </ul>
      </div>
  </div>

 </div>
 
 <!----x------- LISTA DE PELICULAS -----x---- -->
 
<!-- ----- footer ------- -->

<footer class="text-center">
  <p>App pelicula, PHP, JS, AJAX, MYSQL, CSS GRID</p>
</footer>

<!-- -x---- footer -----x-- -->


<!-- -------------SCRIPTS ---------------------------->
      <!-- Bootstrap js -->
      <script src="core/jquery-3.1.1.min.js"></script>
      <script src="core/js/bootstrap.min.js" ></script>
      <script src="core/js/popper.min.js" ></script>
      <!-- Carrusel Slick JS -->
      <script type="text/javascript" src="slick/slick.min.js"></script>
      <!-- My JS -->
      <script src="js/pagination.js"></script>
      <script src="js/mihome.js"></script>

</body>
</html>
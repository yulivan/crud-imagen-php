$(document).ready(function(){

console.log('funciona JQuery Home');

// corrusel de ultimas agregadas -----
function slider(){

  $('.slick-carousel').slick({
  
    speed: 300,
    slidesToShow: 5,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    responsive: [
      {
        breakpoint: 900,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 1,
        }
      },
      {
        breakpoint: 753,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 650,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 420,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
});
}

 // //////////// MOSTRAR DATOS en ultimas agregadas corrusel /////////////////// 
 
  function ultimasAgregadas(){

  var mislick = $('#slick-demo');
  
      $.ajax({
        url: 'home-ultimas.php',
        type: 'GET',
        success: function(response){
          // console.log(response);
          let tasks = JSON.parse(response);
          // esta tareas se recorrera una a una
          let ultimas ='';

          tasks.forEach(task => {
             ultimas +=`
              <div class="testi_item">
                  <img src="${task.rutaimagen}" alt="sliderultimas">
                  <h4>${task.titulo}</h4>
            </div>
             `
          });
          
	         mislick.html(ultimas);

          slider();

        	       }
        	   });
  
}
  ultimasAgregadas();

 // --------x----- MOSTRAR DATOS en ultimas agregadas ------x------


// //////////// TODAS LAS PELICULAS ////////////////////////

   paginador = $(".pagination");

    var itemsPorPag = 10;
    var numerosPorPag = 4;
    var lobuscado = "";
    // inicializa mi paginador
    inicializar(itemsPorPag,numerosPorPag,lobuscado);
    // envia la peticion ajax que se realizara como callback
    set_callback(cargarImagenesHome);
    // carga contenido y paginado
    cargaPagina(0);


    function cargarImagenesHome()
    {

      $.ajax({
        data:{
          "limit":itemsPorPagina,
          "offset":desde,
          "valor": mibuscado
        },
        type:"GET",
        dataType:"json",
        url:"peli-list.php"
      }).done(function(data,textStatus,jqXHR){

        var lista = data.lista;

        $("#homeContent").html("");

        if(pagina==0){
          console.log("pagina home crea paginador");
          creaPaginador(data.total);
        }
        // recorre lista de encontrada y mostrar
        $.each(lista, function(ind, elem){
          $("<div class='box'>"+
          	   "<img src='"+elem.rutaimagen+"' class='galeria'>"+
			         "<h3>"+elem.titulo+"</h3>"+
           "</div>").appendTo($("#homeContent"));
        });     
 
 						
      }).fail(function(jqXHR,textStatus,textError){
        // alert("Error al realizar la peticion".textError);
        console.log('Error al realizar la peticion: '+textError);

      });

}

// ------X------ TODAS LAS PELICULAS ----X------------


});
$(document).ready(function(){
	console.log('funciona JQuery');
   // variable para editar, cambia a true cuando hace click en algun elemento nombre
  let edit = false;
  // console.log("variable edit: "+edit);
  
// //////////// INSERTAR y EDITAR IMAGEN PELICULA ///////////////////////

	$("#insertar-pelicula").submit(insertarPelicula);

	function insertarPelicula(evento){
		evento.preventDefault();

		var datos = new FormData($("#insertar-pelicula")[0]);
		
		$("#respuesta").html("<h3>cargando pelicula...<h3>");
		 let url = edit === false ? 'insertar-pelicula.php' : 'editar-pelicula.php';
		$.ajax({
			url: url,
			type: 'POST',
			data: datos,
			contentType: false,
			processData: false,
			success: function(datos){
				$("#respuesta").html(datos);
				// mostrar en tabla
        cargaPagina(0);
        // limpiar formulario
        $('#insertar-pelicula').trigger('reset');
        edit = false;
        // cambiar texto de boton
        $('#botonform').val('Insertar pelicula');
	}
		});		
		 // pagina no se refresque cada vez al hacer enter
      evento.preventDefault();
	}

// /////////////- SECCION TABLE MOSTRAR,BUSCAR,PAGINACION -//////////

paginador = $(".pagination");

var itemsPorPag = 3;
var numerosPorPag = 3;
var lobuscado = "";

inicializar(itemsPorPag,numerosPorPag,lobuscado);
// envia la peticion ajax que se realizara como callback
set_callback(cargarImagenes);
cargaPagina(0);

// -------- + BUSCAR INPUT +------------------------------
// click input busqueda
$(document).on('keyup', '#busqueda', function(){
  
  var valorBusqueda = $(this).val();
  
  if(valorBusqueda!=""){
    // console.log("al hacer keyeninpu: "+valorBusqueda);
    lobuscado = valorBusqueda;
    inicializar(itemsPorPag,numerosPorPag,lobuscado);
    cargaPagina(0);

  }else{    
    // console.log("en blanco input");
    lobuscado = "";
    inicializar(itemsPorPag,numerosPorPag,lobuscado);
    cargaPagina(0);
  }
});

// ----X ------------ BUSCAR INPUT -- X-------------------


// //////////// PAGINACION MOSTRAR EN TABLE //////////

function cargarImagenes(){

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
        var total = data.total;
        var buscarr = data.buscar;

        console.log("cargar imagenes total: "+total);
        console.log("lo buscado : "+buscarr);

        $("#miTabla").html("");

         if(pagina==0){
          console.log("crea paginador");
          creaPaginador(total);
        }

        $.each(lista, function(ind, elem){

          $("<tr taskId="+elem.idpelicula+" >"+
            "<td>"+elem.idpelicula+"</td>"+
            "<td><a href='#' class='task-item'>"+elem.titulo+"</a></td>"+
            "<td>"+elem.descripcion+"</td>"+
            "<td><img src=' "+elem.rutaimagen+" ' style='height: 100px'></td>"+
            "<td><button class='task-delete btn btn-danger'>Borrar</button></td>"+
            "</tr>").appendTo($("#miTabla"));
        });  
        // si no se encuentran resultados en BD
        if(lista == ""){
          $("<tr>"+
          "<td colspan='5'>No se encontraron resultados</td>"+
          "</tr>").appendTo($("#miTabla"));
          }
       
      }).fail(function(jqXHR,textStatus,textError){
        // alert("Error al realizar la peticion dame".textError);
        console.log('Error al realizar la peticion: '+textError);

      });

}    

// --X---------- PAGINACION MOSTRAR TABLE ----X---------

// ///////// CANCELAR BOTON ////////////////
 $(document).on('click','.cancelar',function(){
    // limpiar formulario
     $('#insertar-pelicula').trigger('reset');
     edit = false;
     // cambiar texto de boton
     $('#botonform').val('Insertar pelicula');
  });

// ///////////  ELIMINAR ////////////////////////////////////
  
  // en mi documento escuchar clase task-delete
    $(document).on('click','.task-delete',function(){
     if(confirm('Desea Eliminar pelicula')){
      // console.log($(this));
      // encontrar fila td de mi tabla
      let element = $(this)[0].parentElement.parentElement;
      // console.log(element);
      // dentro de element encontar atributo 
      let id = $(element).attr('taskId');
      // console.log("id encontrado click: "+id);
      $.post('elimi-peli.php', {id}, function(response){
        // console.log(response);
        cargaPagina(0);
      })
     }
    });
 
 // ///////////////// EDITAR //////////////////////////////////

    // seleccionar elemento id para enviar a base y traer demas valores
    $(document).on('click', '.task-item', function (){
      console.log('editando');
      let element = $(this)[0].parentElement.parentElement;
      let id = $(element).attr('taskId');
      console.log(id);
      $.post('task-single.php', {id}, function(response){
        // console.log(response);
        const task = JSON.parse(response);
        // console.log(task);
        $('#nombrePeli').val(task.nombrePeli);
        $('#descripcion').val(task.descripcion);
        $('#genero').val(task.genero);
        $('#taskId').val(task.id);
        $('#idpeli').val(task.id);
        // cambiar texto de boton
        $('#botonform').val('Actualizar');

        edit = true;
        console.log("clic editar: "+edit);
      })
      });

});

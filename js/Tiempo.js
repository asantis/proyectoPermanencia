<!-- AJAX aqui se llama la url: de donde vienen los datos a donde van que es el .done y el document es el input que se utilizara para filtrar los datos -->

$(busqueda_fecha());
function busqueda_fecha(consulta){
	$.ajax({
		url: '../Buscadores/BuscarTiempoCamiones.php',
		type: 'POST',
		dataType:'html',
		data: {consulta: consulta},
	})
	.done(function(respuesta){
		$("#datagrid").html(respuesta);
	})
	.fail(function(){
			console.log("error");
		})
}

<!--La funcion llama al input con id Fecha y al apretar el btnFech se hace la busqueda-->
$(document).on('click', '#btnFech', function(){
	var valor = $('#fecha').val();
	if(valor != ""){
			busqueda_fecha(valor);
		}else{
			busqueda_fecha();
		}
});



<!-- Busqueda Patente -->

$(busqueda_patente());
function busqueda_patente(pregunta){
	$.ajax({
		url: '../Buscadores/BuscarTiempoCamiones.php',
		type: 'POST',
		dataType:'html',
		data: {pregunta: pregunta},
	})
	.done(function(answer){
		$("#datagrid").html(answer);
	})
	.fail(function(){
			console.log("error");
		})
}
<!--La funcion llama al input con id Patente y el ajax busca automaticamente si hay coincidencia-->
$(document).on('keyup', '#patente', function(){
	var num = $(this).val();
	if(num != ""){
			busqueda_patente(num);
		}else{
			busqueda_patente();
		}
});

<!-- Datos camiones terminal -->

$(consulta_fecha());
function consulta_fecha(question){
	$.ajax({
		url: '../Buscadores/BuscaPatentePermanencia.php',
		type: 'POST',
		dataType:'html',
		data: {question: question},
	})
	.done(function(response){
		$("#gridFecha").html(response);
	})
	.fail(function(){
			console.log("error");
		})
}

<!--La funcion llama al input con id txtfecha y al apretar el btnFecha se hace la busqueda-->
$(document).on('click', '#btnFecha', function(){
	var valor = $("#txtFecha").val();
	if(valor != ""){
			consulta_fecha(valor);
		}else{
			consulta_fecha();
		}
});

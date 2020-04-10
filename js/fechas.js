
<!-- Busqueda de fechas se llama la url que normalmente vienen de la carpeta buscadores -->
$(buscar_fecha());
function buscar_fecha(consulta){
	$.ajax({
		url: '../Buscadores/BuscarFechaGrafico.php',
		type: 'POST',
		dataType:'html',
		data: {consulta: consulta},
	})
	.done(function(respuesta){
		$("#datadate").html(respuesta);
	})
	.fail(function(){
			console.log("error");
		})
}

<!--La funcion llama al input con id date y al apretar el boton con id #envio se hace la busqueda-->
$(document).on('click', '#envio', function(){
	var valor = $('#date').val();
	if(valor != ""){
			buscar_fecha(valor);
		}else{
			buscar_fecha();
		}
});
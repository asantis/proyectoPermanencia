<!--  Buscar automaticamente las patentes en la tabla al usar el input que llama si id -->

$(buscar_dato());
function buscar_dato(consulta){
	$.ajax({
		url: '../Buscadores/buscar.php',
		type: 'POST',
		dataType:'html',
		data: {consulta: consulta},
	})
	.done(function(respuesta){
		$("#datos").html(respuesta);
	})
	.fail(function(){
			console.log("error");
		})
}


$(document).on('click', '#patente', function(){
	var valor = $(this).val();
	if(valor != ""){
			buscar_dato(valor);
		}else{
			buscar_dato();
		}
});

<!-- Para actualizar automaticamente las patentes -->
function intervalo(pregunta){

$.ajax({
type: 'POST',
    url: '../ingreso.php', 
    data: {pregunta:pregunta},
    success: function(res) {
            $('#patente').html(res).delay(2000);
    }
});          
 		
}

function intervalo_salida(salida){

$.ajax({
type: 'POST',
    url: '../salida.php', 
    data: {salida:salida},
    success: function(res) {
            $('#patente').html(res).delay(2000);
    }
});          
 		
}
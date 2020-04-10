
$(document).ready(function(){
    $('#data_table').Tabledit({
        deleteButton: false,
        editButton: false,          
        columns: {
          identifier: [0, 'idUsuario'],                    
          editable: [[1, 'nombre'], [2, 'apellido'], [3, 'usuario'], [4, 'contrasena'], [5, 'idRol']]
        },
        hideIdentifier: true,
        url: '../editarCelda.php'      
    });
});// JavaScript Document


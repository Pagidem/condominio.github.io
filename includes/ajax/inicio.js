$(document).ready(function(){
	visitas();
}); 

function visitas(){
    $.ajax({
        url:"?view=consultas&tipo=visitas",
        contentType:'application/json; charset=utf-8',
        method:"GET",
        data:"",
        cache:"false",
        dataType: 'json',
        beforeSend:function() {
          result = '<div class="alert alert-dismissible alert-warning">';
          result += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
          result += '<strong>ESPERE: </strong>Recuperando datos del servidor.';
          result += '</div>';
          $('#AVISO2').html(result);
        },
        success:function(data) {
          if (data != '0') {
              for (var i = 0; i < data.length; i++) {
                    
                    if (data[i]['estadov'] == 1) {
                        $('#tblVisitas').append('<tr>'+
                          '<td>' + data[i]['idvisita'] + '</td>'+
                          '<td>' + data[i]['nombres'] + ' '+ data[i]['apaterno']+' '+ data[i]['amaterno'] +'</td>'+
                          '<td>' + data[i]['placa'] +' '+ data[i]['letras'] +'</td>'+
                          '<td>' + data[i]['bloque'] + data[i]['casa'] + '</td>'+
                          '<td>' + data[i]['fingreso'] +' '+ data[i]['hingreso'] +'</td>'+
                          '<td><button class="btn btn-success"><i class="fa fa-arrow-alt-circle-up"></i></button></td>' +
                          '<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#miModal"><i class="fa fa-eye"></i></button></td>'+
                        '</tr>');
                    } else{
                      $('#tblVisitas').append('<tr>'+
                          '<td>' + data[i]['idvisita'] + '</td>'+
                          '<td>' + data[i]['nombres'] + ' '+ data[i]['apaterno']+' '+ data[i]['amaterno'] +'</td>'+
                          '<td>' + data[i]['placa'] +' '+ data[i]['letras'] +'</td>'+
                          '<td>' + data[i]['bloque'] + data[i]['casa'] + '</td>'+
                          '<td>' + data[i]['fingreso'] +' '+ data[i]['hingreso'] +'</td>'+
                          '<td><button class="btn btn-danger"><i class="fa fa-arrow-alt-circle-down"></i></button></td>' +
                          '<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#miModal"><i class="fa fa-eye"></i></button></td>'+
                        '</tr>');
                    }
              }
              $('#AVISO2').html('');
          } else {
              result = '<div class="alert alert-dismissible alert-danger">';
              result += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
              result += '<strong>ESPERE: </strong>No hay registro de visitas.';
              result += '</div>';
              $('#AVISO2').html(data);
          }
        },
        complete:function() {
        }
      });
}

// Función para cargar datos en el modal
function cargarDatosEnModal(datos) {
  // Aquí puedes agregar el código para mostrar los datos en el modal
  $('#datosModal').html('<p>' + datos + '</p>');
}

// Evento cuando se muestra el modal
$('#miModal').on('show.bs.modal', function (event) {
  // Aquí puedes obtener los datos que deseas mostrar en el modal
  var datos = 'Datos a mostrar en el modal';
  
  // Llama a la función para cargar los datos en el modal
  cargarDatosEnModal(datos);
});

function mostrarDatos(data) {
    var tablaBody = $('#tblVisitas tbody');
    $.each(data, function(index, item) {
        // Añadir una fila a la tabla por cada objeto en el JSON
        if (data.estadov == 1) {
          var fila = '<tr>' +
                       '<td>' + item.idvisita + '</td>' +
                       '<td>' + item.nombres +' '+ item.apaterno +' '+ item.amaterno + '</td>' +
                       '<td>' + item.placa +item.letras + '</td>' +
                       '<td>' + item.bloque+item.casa + '</td>' +
                       '<td>' + item.fingreso+' '+item.hingreso + '</td>' +
                       '<td><button class="btn btn-success"><i class="fa fa-arrow-alt-circle-up"></i></button></td>' +
                       '<td><button id="v'+item.idvisita+'" class="btn btn-primary"><i class="fa fa-eye"></i></button></td>' +
                   '</tr>';
          tablaBody.append(fila);
        } else {
          var fila = '<tr>' +
                       '<td>' + item.idvisita + '</td>' +
                       '<td>' + item.nombres +' '+ item.apaterno +' '+ item.amaterno + '</td>' +
                       '<td>' + item.placa +item.letras + '</td>' +
                       '<td>' + item.bloque+item.casa + '</td>' +
                       '<td>' + item.fingreso+' '+item.hingreso + '</td>' +
                       '<td><button class="btn btn-warning"><i class="fa fa-arrow-alt-circle-down"></i></button></td>' +
                       '<td><button id="v'+item.idvisita+'" class="btn btn-primary"><i class="fa fa-eye"></i></button></td>' +
                   '</tr>';
          tablaBody.append(fila);
        }
        
    });
}
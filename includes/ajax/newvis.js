/*Metodo para obtener los datos de persona*/
function verificar()
{
  /*Datos de documento */
  var ci = $('#doc').val();

  if ($.trim(ci).length > 0) 
  {
    verificar_ajax(ci);
  }
  else
  {
    result = '<div class="alert alert-dismissible alert-danger">';
    result += '<strong>ERROR: </strong>Todos los campos deben estar llenos.';
    result += '</div>';
    $('#AVISO3').html(result);
  }
} 

function verificar_ajax(ci){
  $.ajax({
    url:"?view=consultas&tipo=verper",
    contentType:'application/json; charset=utf-8',
    method:"GET",
    data:{ci:ci},
    cache:"false",
    dataType: 'json',
    beforeSend:function()
    {
      result = '<div class="alert alert-dismissible alert-warning">';
      result += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
      result += '<strong>ESPERE: </strong>Recuperando datos del servidor.';
      result += '</div>';
      $('#AVISO3').html(result);
    },
    success:function(data)
    {
      if (data != '0') {
        for (var i = 0; i < data.length; i++)
        {
          
          /*asignar el numero de habitacion*/
          $("#idd").html(data[i]['idp']);
          $('#ext option:selected').html(data[i]['extension']).val(data[i]['extension']);
          $('#td option:selected').html(data[i]['tipo']).val(data[i]['tipo']);
          $("#ce").val(data[i]['celular']);
          $("#no").val(data[i]['nombres']);
          $("#pat").val(data[i]['apaterno']);
          $("#mat").val(data[i]['amaterno']);
          
          result = '<div class="alert alert-dismissible alert-success">';
          result += '<strong>ESPERE: </strong>Datos personales cargados, continue rellenando el formulario.';
          result += '</div>';
          $('#AVISO3').html(result);

        }
      }else{
        result = '<div class="alert alert-dismissible alert-warning">';
        result += '<strong>ESPERE: </strong>Datos personales no registrados, se realizara un nuevo registro.';
        result += '</div>';
        $('#AVISO3').html(result);
      }
    },
    complete:function() {
      
    }
  });
}

/*Metodo para obtener los datos de vehiculo*/
function vPlaca()
{
  /*Datos de documento */
  var placa = $('#np').val();
  var letra = $('#lp').val();

  if ($.trim(placa).length > 0 && $.trim(letra).length > 0) 
  {
    vplaca_ajax(placa,letra);
  }
  else
  {
    result = '<div class="alert alert-dismissible alert-danger">';
    result += '<strong>ERROR: </strong>Ingresar datos de placa si desea añadir vehiculo';
    result += '</div>';
    $('#AVISO3').html(result);
  }
} 

function vplaca_ajax(placa,letra){
  $.ajax({
    url:"?view=consultas&tipo=verveh",
    contentType:'application/json; charset=utf-8',
    method:"GET",
    data:{placa:placa,lp:letra},
    cache:"false",
    dataType: 'json',
    beforeSend:function()
    {
      result = '<div class="alert alert-dismissible alert-warning">';
      result += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
      result += '<strong>ESPERE: </strong>Recuperando datos del servidor.';
      result += '</div>';
      $('#AVISO3').html(result);
    },
    success:function(data)
    {
      if (data != "0") {
        for (var i = 0; i < data.length; i++)
        {
          
          /*asignar las letras de placa*/
          $("#idve").html(data[i]['idv']);
          $("#oc").val(data[i]['ocupantes']);
          $('#tve option:selected').html(data[i]['tipo']).val(data[i]['tipo']);
          $("#mv").val(data[i]['marca']);

          /*Eliminamos el input */
          $("#fot").remove();
          var img = $('<img id="fot" alt="" style="width:60px;height:60px;">').attr('src', 'data:image/jpeg;base64,' + data[i]['foto']);
          /*Crear una img con el id anterior */
          $("#lf").append(img);
          
          result = '<div class="alert alert-dismissible alert-success">';
          result += '<strong>ESPERE: </strong>Datos del vehiculos cargados, continue rellenando el formulario.';
          result += '</div>';
          $('#AVISO3').html(result);

        }
      }else{
        result = '<div class="alert alert-dismissible alert-warning">';
        result += '<strong>ESPERE: </strong>Datos vehiculares no registrados, se realizara un nuevo registro.';
        result += '</div>';
        $('#AVISO3').html(result);
      }
    },
    complete:function() {
      
    }
  });
}

/*Metodo para registrar una nueva visita con datos personales ya registrados*/
function visita1()
{

  var persona = $('#idd').html();
  var vehiculo = $('#idve').html();
  /*Datos de persona*/
  var ci = $('#doc').val();
  var ext = $('#ext').val();
  var tipod = $('#td').val();
  var celular = $('#ce').val();
  var nombres = $('#no').val();
  var paterno = $('#pat').val();
  var materno = $('#mat').val();


   /*Datos de vehiculo */
   var placa  = $('#np').val();
   var letras  = $('#lp').val();
   var ocupantes  = $('#oc').val();
   var tipov  = $('#tve').val();
   var marca  = $('#mv').val();
   var foto  = $('#fot').val();
   

  /*Detalles de la visita */
  var tvi = $('#tvi').val();
  var emp = $('#emp').val();
  var fing = $('#fi').val();
  var hing = $('#hi').val();
  var fsal= $('#fs').val();
  var hsal = $('#hs').val();
  var ca= $('#ca').val();
  var bl = $('#bl').val();
  var obs  = $('#obs').val();


    if (persona > 0 && vehiculo == 0) {
      if ($.trim(placa).length > 0 && $.trim(letras).length > 0 && $.trim(ocupantes).length > 0 && $.trim(tipov).length > 0 && $.trim(marca).length > 0 && $.trim(foto).length > 0 &&
      $.trim(tvi).length > 0 && $.trim(emp).length > 0 && $.trim(fing).length > 0 && $.trim(hing).length > 0 && $.trim(fsal).length > 0 && $.trim(hsal).length > 0 &&
      $.trim(ca).length > 0 &&$.trim(bl).length > 0 && $.trim(obs).length > 0) {
          visita1_ajax(
          placa,letras,ocupantes,tipov,marca,foto,
          tvi,emp,fing,hing,fsal,hsal,ca,bl,obs,persona);
      } else {
        result = '<div class="alert alert-dismissible alert-danger">';
        result += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
        result += '<strong>ERROR: </strong>Todos los campos deben estar llenos.';
        result += '</div>';
        $('#AVISO3').html(result);
      }
    }else if (persona > 0 && vehiculo > 0) {
      if ($.trim(tvi).length > 0 && $.trim(emp).length > 0 && $.trim(fing).length > 0 && $.trim(hing).length > 0 && $.trim(fsal).length > 0 && $.trim(hsal).length > 0 &&
      $.trim(ca).length > 0 &&$.trim(bl).length > 0 && $.trim(obs).length > 0) {
          visita2_ajax(
          tvi,emp,fing,hing,fsal,hsal,ca,bl,obs,persona,vehiculo);
      } else {
        result = '<div class="alert alert-dismissible alert-danger">';
        result += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
        result += '<strong>ERROR: </strong>Todos los campos deben estar llenos.';
        result += '</div>';
        $('#AVISO3').html(result);
      }
  } else if (persona== 0 && vehiculo== 0)
  {
      visita3_ajax(
      ci,ext,tipod,celular,nombres,paterno,materno,
      placa,letras,ocupantes,tipov,marca,foto,
      tvi,emp,fing,hing,fsal,hsal,ca,bl,obs,persona);

        
  }else {
      result = '<div class="alert alert-dismissible alert-danger">';
      result += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
      result += '<strong>ERROR: </strong>Todos los campos deben estar llenos.';
      result += '</div>';
      $('#AVISO3').html(result);
  }
}


/*Metodo ajax registrar datos de visita que ya tiene datos personales y vehiculo registrados*/
function visita1_ajax(
  placa,letras,ocupantes,tipov,marca,foto,
  tvi,emp,fing,hing,fsal,hsal,ca,bl,obs,persona)
{
  $.ajax
  ({
    url:"?view=registros&tipo=newv1",
    method:"POST",
    data:{
      pl:placa,lp:letras,oc:ocupantes,tv:tipov,mv:marca,fo:foto,
      tvi:tvi,emp:emp,fi:fing,hi:hing,fs:fsal,hs:hsal,ca:ca,bl:bl,ob:obs,pe:persona},
    cache:"false",
    beforeSend:function() {
      result = '<div class="alert alert-dismissible alert-warning">';
      result += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
      result += '<strong>PROCESANDO: </strong>Se esta procesando el registro.';
      result += '</div>';
      $('#AVISO3').html(result);
    },
    success:function(data) {
      if (data == '1') {
        
        alert('Se ha registrado exitosamente la visita!');
        
        $(location).attr('href', '?view=inicio');

      } else {
        result = '<div class="alert alert-dismissible alert-danger">';
        result += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
        result += '<strong>ERROR: </strong>Ha ocurrido un error inesperado.<br />';
        result += '</div>' + data;
        $('#AVISO3').html(result);
      }
    },
    complete:function() {
        
    }
  });
}

/*Metodo ajax registrar datos de visita que ya tiene datos personales y vehiculo registrados*/
function visita2_ajax(
  tvi,emp,fing,hing,fsal,hsal,ca,bl,obs,persona,vehiculo)
{
  $.ajax
  ({
    url:"?view=registros&tipo=newv2",
    method:"POST",
    data:{
      tvi:tvi,emp:emp,fi:fing,hi:hing,fs:fsal,hs:hsal,ca:ca,bl:bl,ob:obs,pe:persona,veh:vehiculo},
    cache:"false",
    beforeSend:function() {
      result = '<div class="alert alert-dismissible alert-warning">';
      result += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
      result += '<strong>PROCESANDO: </strong>Se esta procesando el registro.';
      result += '</div>';
      $('#AVISO3').html(result);
    },
    success:function(data) {
      if (data == '1') {
        
        alert('Se ha registrado exitosamente la visita!');
        
        $(location).attr('href', '?view=inicio');

      } else {
        result = '<div class="alert alert-dismissible alert-danger">';
        result += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
        result += '<strong>ERROR: </strong>Ha ocurrido un error inesperado.<br />';
        result += '</div>' + data;
        $('#AVISO3').html(result);
      }
    },
    complete:function() {
        
    }
  });
}

/*Metodo ajax registrar datos de visita que ya tiene datos personales y vehiculo registrados*/
function visita3_ajax(
  ci,ext,tipod,celular,nombres,paterno,materno,
  placa,letras,ocupantes,tipov,marca,foto,
  tvi,emp,fing,hing,fsal,hsal,ca,bl,obs,persona)
{
  $.ajax
  ({
    url:"?view=registros&tipo=newv3",
    method:"POST",
    data:{
      ci:ci,ext:ext,td:tipod,ce:celular,no:nombres,pa:paterno,ma:materno,
      pl:placa,lp:letras,oc:ocupantes,tv:tipov,mv:marca,fo:foto,
      tvi:tvi,emp:emp,fi:fing,hi:hing,fs:fsal,hs:hsal,ca:ca,bl:bl,ob:obs},
    cache:"false",
    beforeSend:function() {
      result = '<div class="alert alert-dismissible alert-warning">';
      result += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
      result += '<strong>PROCESANDO: </strong>Se esta procesando el registro.';
      result += '</div>';
      $('#AVISO3').html(result);
    },
    success:function(data) {
      if (data == '1') {
        
        alert('Se ha registrado exitosamente la visita!');
        
        $(location).attr('href', '?view=inicio');

      } else {
        result = '<div class="alert alert-dismissible alert-danger">';
        result += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
        result += '<strong>ERROR: </strong>Ha ocurrido un error inesperado.<br />';
        result += '</div>' + data;
        $('#AVISO3').html(result);
      }
    },
    complete:function() {
        
    }
  });
}





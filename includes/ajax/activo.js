$(document).ready(function(){
    nickUsuario();
});

function nickUsuario()
{
    var id = $("#v-idu").html();
    $.ajax({
        url: "?view=consultas&tipo=uactivo",
        method: "POST",
        data: {id:id},
        cache: "false",
        beforeSend: function () {
        },
        success: function (data) {
            if (data != null) {
                $("#v-usuario").html(data + ' ');
                tipoSidebar();
            }else{
                $("#v-usuario").html('Error');
            }
        },
        error: function () {
            alert("Error");
        }
    });
}

function tipoSidebar() {
    var id = $("#v-idu").html();
    $.ajax({
        url: "?view=consultas&tipo=sidebar",
        method: "POST",
        data: {i:id},
        cache: "false",
        beforeSend: function () {
        },
        success: function (data) {
            if (data > 1) {
                $("#v-sidebar").load('includes/complements/s-operador.html');
                
            }else{
                $("#v-sidebar").load('includes/complements/s-admin.html');
            }
        },
        error: function () {
            alert("Error");
        }
    });
}



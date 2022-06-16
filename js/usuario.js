var url = "./../controlador/usuario.controlador.php";

function Consultar() {
    $.ajax({
        url: url,
        data: {"accion": "CONSULTAR"},
        type: 'POST',
        dataType: 'json'
    }).done(function(response){
        var html = "<tr>";
        $.each(response, function(index, data){
            html += "<tr>";
            html += "<td> + data.nombres + </td>";
            html += "<td> + data.apellidos + </td>";
            html += "<td> + data.telefono + </td>";
            html += "<td> + data.direccion + </td>";
            html += "<td> + data.cargo + </td>";
            html += "<td> + data.estado + </td>";
            html += "<td>";
            html += "<button class='btn btn-warning' onclick='ConsultarPorId(" + data.idUsuario + ");>Modificar</button>"
            html += "<button class='btn btn-danger' onclick='Eliminar(" + data.idUsuario + ");>Eliminar</button>"
            html += "</td>";
            html += "</tr>";
        });

        document.getElementById("datos").innerHTML = html;

    }).fail(function(response){
        console.log(response);
    })
}

function ConsultarPorId(idUsuario) {
    $.ajax({
        url: url,
        data:{"idUsuario" : idUsuario, "accion": "CONSULTAR_ID"},
        type: 'POST',
        dataType: 'json',
    }).done(function(){
        document.getElementById('nombres').value = response.nombres;
        document.getElementById('apellidos').value = response.apellidos;
        document.getElementById('telefono').value = response.telefono;
        document.getElementById('direccion').value = response.direccion;
        document.getElementById('cargo').value = response.cargo;
        document.getElementById('estado').value = response.estado;
        document.getElementById('idUsuario').value = response.idUsuario;
    }).fail(function(response){
        console-log(response);
    })
}

function Guardar() {
    $.ajax({
        url: url,
        data: retornarDatos("GUARDAR"),
        type: 'POST',
        dataType: 'json',
    }).done(function(response){
        if(response == "OK"){
            alert("Datos guardados con éxito");
        }else{
            alert(response);
        }
    }).fail(function(response){
        console.log(response);
    });
}

function Modificar() {
    $.ajax({
        url: url,
        data: retornarDatos("MODIFICAR"),
        type: 'POST',
        dataType: 'json',
    }).done(function(response){
        if(response == "OK"){
            alert("Datos guardados con éxito");
        }else{
            alert(response);
        }
    }).fail(function(response){
        console.log(response);
    });
}

function Eliminar(idUsuario) {
    $.ajax({
        url: url,
        data: {"idUsuario": idUsuario, "accion": "Eliminar"},
        type: 'POST',
        dataType: 'json',
    }).done(function(response){
        if(response == "OK"){
            alert("Datos guardados con éxito");
        }else{
            alert(response);
        }
    }).fail(function(response){
        console.log(response);
    });
}

function Validar() {
    nombres = document.getElementById('nombres').value;
    apellidos = document.getElementById('apellidos').value;
    telefono = document.getElementById('telefono').value;
    direccion = document.getElementById('direccion').value;
    cargo = document.getElementById('cargo').value;
    estado = document.getElementById('estado').value;

    if(nombres == "" || apellidos == "" || telefono == "" || direccion == "" || cargo == "" || estado == ""){
        return false;
    }else{
        return true;
    }

    function retornarDatos(accion){
        return{
            "nombres" : document.getElementById('nombres').value,
            "apellidos" : document.getElementById('apellidos').value,
            "telefono" : document.getElementById('telefono').value,
            "direccion" : document.getElementById('direccion').value,
            "cargo" : document.getElementById('cargo').value,
            "estado" : document.getElementById('estado').value,
            "accion" : accion,
            "idUsuario" : document.getElementById("idUsuario").value
        };
    }
}
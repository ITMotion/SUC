//obtiene las unidades de cada materia y las muestra en el div "unidades" de la página Asistencia.php
function getUnidadesByMateria(materia, grupo, asignatura) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        var divUnidades = document.getElementById('unidades');
        divUnidades.innerHTML = "Cargando...";
        if(xhttp.readyState == 4) {
            divUnidades.innerHTML = xhttp.responseText;
        }
    };
    xhttp.open("GET", "AsistenciaUnid.php?materia="+materia+"&grupo="+grupo+"&asignatura="+asignatura, true);
    xhttp.send();
}

//obtiene el calendario consultando la tabla de gruposmaterias y de unidades
function getCalendar(materia, grupo){
    var unidad = document.getElementById("unidad").value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        var divResponse = document.getElementById('divResponse');
        divResponse.innerHTML = "Cargando...";
        if(xhttp.readyState == 4) {
            divResponse.innerHTML = xhttp.responseText;
        }
    };
    xhttp.open("GET", "AsistenciaTable.php?grupo="+grupo+"&materia="+materia+"&unidad="+unidad, true);
    xhttp.send();
}

function updateAsistencia(bit, alumno, fecha, materia) {
    var ajax = new XMLHttpRequest();
    ajax.open("GET", "../model/asistenciaUpdate.php?fecha="+fecha+"&matricula="+alumno+"&asistencia="+bit+"&materia="+materia, true);
    ajax.send();
}

function getEva(materia, grupo, asignatura) {
    var unidad = document.getElementById("unidad").value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        var divResponse = document.getElementById('divResponse');
        divResponse.innerHTML = "Cargando...";
        if(xhttp.readyState == 4) {
            divResponse.innerHTML = xhttp.responseText;
        }
    }
    xhttp.open("GET", "EVA.php?grupo="+grupo+"&materia="+materia+"&unidad="+unidad+"&asignatura="+asignatura, true);
    xhttp.send();
}

$(document).ready(function() { //funciones para el calculo de la calificación final
    $('#divResponse').on('change', '.cal_saber', function(e) {
        var saber = parseFloat($(this).val()); //tomamos la calificación del saber
        var confSaber = parseFloat($("#confSaber").html()) / 100; //porcentaje que representa el saber en la unidad
        var totalSaber = saber * confSaber; 

        var hacer = parseFloat($(this).parent().parent().find(".cal_hacer").val());
        var confHacer = parseFloat($("#confHacer").html()) / 100;
        var totalHacer = hacer * confHacer;

        var ser = parseFloat($(this).parent().parent().find(".cal_ser").val());
        var confSer = parseFloat($("#confSer").html()) / 100;
        var totalSer = ser * confSer;

        $(this).parent().nextAll(".cal_total").text((totalSaber + totalHacer + totalSer).toFixed(2));
    });
    $("#divResponse").on("change", ".cal_hacer", function(e) {
        var saber = parseFloat($(this).parent().parent().find(".cal_saber").val());
        var confSaber = parseFloat($("#confSaber").html()) / 100;
        var totalSaber = saber * confSaber;

        var hacer = parseFloat($(this).val());
        var confHacer = parseFloat($("#confHacer").html()) / 100;
        var totalHacer = hacer * confHacer;

        var ser = parseFloat($(this).parent().parent().find(".cal_ser").val());
        var confSer = parseFloat($("#confSer").html()) / 100;
        var totalSer = ser * confSer;

        $(this).parent().nextAll(".cal_total").text((totalSaber + totalHacer + totalSer).toFixed(2));
    });
    $("#divResponse").on("change", ".cal_ser", function(e) {
        var saber = parseFloat($(this).parent().parent().find(".cal_saber").val());
        var confSaber = parseFloat($("#confSaber").html()) / 100;
        var totalSaber = saber * confSaber;

        var hacer = parseFloat($(this).parent().parent().find(".cal_hacer").val());
        var confHacer = parseFloat($("#confHacer").html()) / 100;
        var totalHacer = hacer * confHacer;

        var ser = parseFloat($(this).val());
        var confSer = parseFloat($("#confSer").html()) / 100;
        var totalSer = ser * confSer;

        $(this).parent().nextAll(".cal_total").text((totalSaber + totalHacer + totalSer).toFixed(2));
    });
    $("#divResponse").on("change", ".configuraciones", function(e) {
        var saber = parseFloat($("#saberC").val());
        var ser = parseFloat($("#serC").val());
        var hacer = parseFloat($("#hacerC").val());
        total = saber + ser + hacer;
        if(total == 100) {
            $("#btnConfig").removeAttr("disabled");
        } else {
             $("#btnConfig").attr("disabled", true);
        }
    });
});
function saveConfig(){
    //implementando ajax
    $.ajax({
        url: "../model/EVAsaveConfig.php", //url a donde se envian los datos
        type: "POST", //el método de envío
        dataType: "HTML",
        data: $("#frmConfig").serialize() //envía la información del formulario, todos los campos
    })
                    //cuando la función finaliza, recuperamos la respuesta
    .done(function(data) { //data es la respuesta que regresa el ajax
        $("#configuracion").modal("toggle"); //se oculta el modal
        $("#tableConfigSection").empty(); // se vacia el contenido anterior
        $("#tableConfigSection").html(data);
    })
}

function saveCalificacion(numFrm) {
    $.ajax({
        url: "..model/EVAsaveCalif.php",
        type: "POST",
        dataType: "HTML",
        data: $("#frmCalificacion"+numFrm).serialize()
    })

    .done(function(data) {
        alert("Se guardaron las calificaciones");
    })
}
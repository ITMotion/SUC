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

        var hacer = parseFloat($(this).parent().parent().find(".cal_hacer").val()); //porcentaje que representa el hacer
        var confHacer = parseFloat($("#confHacer").html()) / 100;
        var totalHacer = hacer * confHacer;

        var ser = parseFloat($(this).parent().parent().find(".cal_ser").val()); //porcentaje que representa el ser
        var confSer = parseFloat($("#confSer").html()) / 100;
        var totalSer = ser * confSer;

        var cal_total = (totalSaber + totalHacer + totalSer).toFixed(2); 
        $(this).parent().nextAll(".cal_total").text(cal_total);

        var cal_total_letras = calificacion_letras(cal_total);
        $(this).parent().nextAll(".cal_total_letras").text(cal_total_letras);
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

        var cal_total = (totalSaber + totalHacer + totalSer).toFixed(2);
        $(this).parent().nextAll(".cal_total").text(cal_total);

        var cal_total_letras = calificacion_letras(cal_total);
        $(this).parent().nextAll(".cal_total_letras").text(cal_total_letras);
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

        var cal_total = (totalSaber + totalHacer + totalSer).toFixed(2);
        $(this).parent().nextAll(".cal_total").text(cal_total);

        var asistencia = parseFloat($(this).parent().nextAll(".asistencia").html());
        if(asistencia < 85 ) {
            $(this).parent().nextAll(".cal_total_letras").text("NA");
        } else {
            var cal_total_letras = calificacion_letras(cal_total);
            $(this).parent().nextAll(".cal_total_letras").text(cal_total_letras);    
        }
        
    });

    $("#divResponse").on("click", ".btnSaveCalificacion", function(e) {
        var materiaC = $("#materiaC").html();
        var unidadC = $("#unidadC").html();
        var saberC = $(this).parent().parent().find(".cal_saber").val();
        var hacerC = $(this).parent().parent().find(".cal_hacer").val();
        var serC = $(this).parent().parent().find(".cal_ser").val();
        var asistenciaC = $(this).parent().parent().find(".asistencia").html();
        var alumnoC = $(this).parent().parent().find(".alumno").html();
        var totalC =  $(this).parent().parent().find(".cal_total").html();
        $.ajax({
            url: "../model/EVAsaveCalif.php",
            type: "POST",
            dataType: "HTML",
            data :{
                materia: materiaC,
                unidad: unidadC,
                saber: saberC,
                hacer: hacerC,
                ser: serC,
                asistencia: asistenciaC,
                alumno: alumnoC,
                total: totalC
            }
        })
        .done(function(data) {
            $("#msjSuccess").html(data);
        })
    });
    $("#divResponse").on("change", ".configuraciones", function(e){
        var saber = parseFloat($("#saberC").val());
        var hacer = parseFloat($("#hacerC").val());
        var ser = parseFloat($("#serC").val());
        if (saber + hacer + ser == 100) {
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
function calificacion_letras(cal_total) {
    if (cal_total >= 95) {
        var cal_total_letras = "AU";
    }
    if(cal_total >= 85 && cal_total < 95) {
        var cal_total_letras = "DE";
    }
    if(cal_total < 85 && cal_total >= 80) {
        var cal_total_letras = "SA";
    }
    if(cal_total < 80) {
        var cal_total_letras = "NA";
    }
    console.log(cal_total_letras);
    return cal_total_letras;
}
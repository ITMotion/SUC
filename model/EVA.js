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

        var asistencia = parseFloat($(this).parent().nextAll(".asistencia").html());
        var tram = $(this).parent().parent().find(".tr_am");
        tram.empty();

        if(asistencia < 85 ) { //Si no tiene el porcentaje de asistencia requerido para derecho a calificación
            $(this).parent().nextAll(".cal_desempeño").text("NA");
            $(this).parent().nextAll(".cal_total").addClass(".warning");
        } else {
            if(cal_total < 80) { // si la calificación final es reprobatoria aplicara el checkbox para acción de mejora
                tram.append('<input type="checkbox" class="cb_am">');
            }
            var cal_desempeño = calificacion_letras(cal_total);
            $(this).parent().nextAll(".cal_desempeño").text(cal_desempeño);    
        }
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

        var asistencia = parseFloat($(this).parent().nextAll(".asistencia").html());
        var tram = $(this).parent().parent().find(".tr_am");
        tram.empty();

        if(asistencia < 85 ) { //Si no tiene el porcentaje de asistencia requerido para derecho a calificación
            $(this).parent().nextAll(".cal_desempeño").text("NA");
            
        } else {
            if(cal_total < 80) { // si la calificación final es reprobatoria aplicara el checkbox para acción de mejora
               tram.append('<input type="checkbox" class="cb_am">');
            }
            var cal_desempeño = calificacion_letras(cal_total);
            $(this).parent().nextAll(".cal_desempeño").text(cal_desempeño);    
        }       
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
        
        var tram = $(this).parent().parent().find(".tr_am");
        tram.empty();
        if(asistencia < 85 ) { //si no tiene el porcentaje de asistencia requerido para calificación
            $(this).parent().nextAll(".cal_desempeño").text("NA");
        } else {
            if(cal_total < 80) { // si la calificación final es reprobatoria aplicara el checkbox para acción de mejora
                tram.append('<input type="checkbox" value="1" class="cb_am">');
            }
            var cal_desempeño = calificacion_letras(cal_total);
            $(this).parent().nextAll(".cal_desempeño").text(cal_desempeño);    
        }
    });

    //botón para guardar la calificación
    $("#divResponse").on("click", ".btnSaveCalificacion", function(e) {
        var materiaC = $("#materiaC").html();
        var unidadC = $("#unidadC").html();

        var th_btn = $(this).parent().parent().find(".th_btn");
        
        var saberC = $(this).parent().parent().find(".cal_saber").val();
        var thSaber = $(this).parent().parent().find(".th_saber");

        var hacerC = $(this).parent().parent().find(".cal_hacer").val();
        var thHacer = $(this).parent().parent().find(".th_hacer");

        var serC = $(this).parent().parent().find(".cal_ser").val();
        var thSer = $(this).parent().parent().find(".th_ser");

        var alumnoC = $(this).parent().parent().find(".alumno").html();
        var totalC =  $(this).parent().parent().find(".cal_total").html();
        var tram = $(this).parent().parent().find(".cb_am"); //checkbox de acción de mejora
        var amC = 0;
        if(tram.val() != undefined) {
            if(tram.is(':checked')) {
                amC = 1;
            } else{
                amC = 0;
            }
        }
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
                alumno: alumnoC,
                total: totalC,
                am: amC
            }
        })
        .done(function(data) {
            $("#msjSuccess").html(data);
            setCampos();
        })
    });

    //botón para desbloquear la edición de la calificación
    $("#divResponse").on("click", ".btnEditarCampos", function(e) {
        var saberTh = $(this).parent().parent().find(".th_saber");
        var saberC = saberTh.html();

        var hacerTh = $(this).parent().parent().find(".th_hacer");
        var hacerC = hacerTh.html();

        var serTh = $(this).parent().parent().find(".th_ser");
        var serC = serTh.html();

        var thBtn = $(this).parent().parent().find(".th_btn");

        var thAm = $(this).parent().parent().find(".tr_am");

        var finalC = parseFloat($(this).parent().parent().find(".cal_total").html());
        
        saberTh.empty();
        saberTh.append('<input type="number" min="0" max="100" class="cal_saber" value='+saberC+'>');

        hacerTh.empty();
        hacerTh.append('<input type="number" min="0" max="100" class="cal_hacer" value='+hacerC+'>');

        serTh.empty();
        serTh.append('<input type="number" min="0" max="100" class="cal_ser" value='+serC+'>');
        thBtn.empty();
        
        if (finalC < 80) { //si está reprobado
            if (thAm.html()=="SA") {
                thAm.empty();
                thAm.append('<input type="checkbox" value="1" class="cb_am" checked="true">')
            } else {
                thAm.append('<input type="checkbox" value="0" class="cb_am">'); //botón para la acción de mejora    
            }
        } 
        thBtn.append('<a class="btnEditCalificacion"><img src="../image/icons/save.png" onmouseover="this.src=\'../image/icons/savecolor.png\'" onmouseout="this.src=\'../image/icons/save.png\'"></a>');
    });


    //botón para actualizar la calificación en la base de datos
    $("#divResponse").on("click", ".btnEditCalificacion", function(e) {
        var materiaC = $("#materiaC").html();
        var unidadC = $("#unidadC").html();
        var saberC = $(this).parent().parent().find(".cal_saber").val();
        var hacerC = $(this).parent().parent().find(".cal_hacer").val();
        var serC = $(this).parent().parent().find(".cal_ser").val();
        var alumnoC = $(this).parent().parent().find(".alumno").html();
        var totalC =  $(this).parent().parent().find(".cal_total").html();
        var tram = $(this).parent().parent().find(".cb_am"); //checkbox de acción de mejora
        var amC = 0;
        if(tram.val() != undefined) {
            if(tram.is(':checked')) {
                amC = 1;
            } else {
                amC = 0;
            }
        }
        $.ajax({
            url: "../model/EVAupdateCalif.php",
            type: "POST",
            dataType: "HTML",
            data: {
                materia: materiaC,
                unidad: unidadC,
                saber: saberC,
                hacer: hacerC,
                ser: serC,
                alumno: alumnoC,
                total: totalC,
                am : amC
            }
        })
        .done(function(data) {
            $("#msjSuccess").html(data);
            var th_btn = $(this).parent().parent().find(".th_btn");
            var thSaber = $(this).parent().parent().find(".th_saber");
            var thHacer = $(this).parent().parent().find(".th_hacer");
            var thSer = $(this).parent().parent().find(".th_ser");
            thSaber.empty();
            console.log(thSaber);
        })
    });

    //validación de que los porcentajes den un total de 100%
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

    //botón de configuración de porcentajes
    $("#divResponse").on("click", "#btnConfig", function(){ 
        $.ajax({
            url: "../model/EVAsaveConfig.php",
            type: "POST",
            dataType: "HTML",
            data: $("#frmConfig").serialize()
        })
        .done(function(data) { 
            $("#configuracion").modal("toggle"); //se oculta el modal
            $("#tableConfigSection").empty(); // se vacia el contenido anterior
            $("#tableConfigSection").html(data); //se aplican las nuevas configuraciones
        })
    });
    $(".btn")
});
function calificacion_letras(cal_total) {
    if (cal_total >= 95) {
        var cal_desempeño = "AU";
    }
    if(cal_total >= 85 && cal_total < 95) {
        var cal_desempeño = "DE";
    }
    if(cal_total < 85 && cal_total >= 80) {
        var cal_desempeño = "SA";
    }
    if(cal_total < 80) {
        var cal_desempeño = "NA";
    }
    return cal_desempeño;
}

function setCampos() { //después de ingresar la calificación se setean los valores
    thSaber.empty();
    thSaber.html(saberC);
    thHacer.empty();
    thHacer.html(hacerC);
    thSer.empty();
    thSer.html(serC);
    th_btn.empty();
    th_btn.append('<a class="btnEditarCampos"><img src="../image/icons/edit.png" onmouseover="this.src=\'../image/icons/editcolor.png\'" onmouseout="this.src=\'../image/icons/edit.png\'"></a>');
}
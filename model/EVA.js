$(document).ready(function() { //funciones para el calculo de la calificación final
    $('#divResponse').on('change', '.cal_saber', function(e) {
        var saber = parseFloat($(this).val()); //tomamos la calificación del saber
        var confSaber = parseFloat($("#confSaber").html()) / 100; //porcentaje que representa el saber en la unidad
        var totalSaber = saber * confSaber; 
        console.log(saber);
        var hacer = parseFloat($(this).parent().parent().find(".cal_hacer").val()); //porcentaje que representa el hacer
        var confHacer = parseFloat($("#confHacer").html()) / 100;
        var totalHacer = hacer * confHacer;

        var ser = parseFloat($(this).parent().parent().find(".cal_ser").val()); //porcentaje que representa el ser
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
        if(asistencia < 85 ) {
            $(this).parent().nextAll(".cal_total_letras").text("NA");
        } else {
            var cal_total_letras = calificacion_letras(cal_total);
            $(this).parent().nextAll(".cal_total_letras").text(cal_total_letras);    
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
        if(asistencia < 85 ) {
            $(this).parent().nextAll(".cal_total_letras").text("NA");
        } else {
            var cal_total_letras = calificacion_letras(cal_total);
            $(this).parent().nextAll(".cal_total_letras").text(cal_total_letras);    
        }
        
    });

    //botón para guardar la calificación
    $("#divResponse").on("click", ".btnSaveCalificacion", function(e) {
        var materiaC = $("#materiaC").html();
        var unidadC = $("#unidadC").html();
        var saberC = $(this).parent().parent().find(".cal_saber").val();
        var hacerC = $(this).parent().parent().find(".cal_hacer").val();
        var serC = $(this).parent().parent().find(".cal_ser").val();
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
                alumno: alumnoC,
                total: totalC
            }
        })
        .done(function(data) {
            $("#msjSuccess").html(data);
        })
    });

    //botón para editar la configuración
    $("#divResponse").on("click", ".btnEditarCampos", function(e) {
        var saberTh = $(this).parent().parent().find(".th_saber");
        var saberC = saberTh.html();

        var hacerTh = $(this).parent().parent().find(".th_hacer");
        var hacerC = saberTh.html();

        var serTh = $(this).parent().parent().find(".th_ser");
        var serC = serTh.html();

        var thBtn = $(this).parent().parent().find(".th_btnEditar");

        var thAm = $(this).parent().parent().find(".tr_am");

        saberTh.empty();
        saberTh.append('<input type="number" min="0" max="100" class="cal_saber" value='+saberC+'>');

        hacerTh.empty();
        hacerTh.append('<input type="number" min="0" max="100" class="cal_hacer" value='+hacerC+'>');

        serTh.empty();
        serTh.append('<input type="number" min="0" max="100" class="cal_ser" value='+serC+'>');

        thBtn.empty();
        thBtn.append('<a class="btnEditCalificacion"><img src="../image/icons/save.png" onmouseover="this.src=\'../image/icons/savecolor.png\'" onmouseout="this.src=\'../image/icons/save.png\'"></a>');

        thAm.append('<input type="checkbox" value="1" class="cb_am">');
    });

    //botón para aplicar la acción de mejora
    $("#divResponse").on("change", ".cb_am", function(e) {
        if($(this).is(":checked")) {
            $(this).parent().parent().find(".cal_desempeño").text("SA");
        }
    });


    //botón para actualizar la configuración en la base de datos


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
    return cal_total_letras;
}
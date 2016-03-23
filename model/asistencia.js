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
function getCalendar(materia, grupo, asignatura){
    var unidad = document.getElementById("unidad").value;
    console.log(materia + " " + grupo + " " + asignatura + " " + unidad);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        var divResponse = document.getElementById('divResponse');
        divResponse.innerHTML = "Cargando...";
        if(xhttp.readyState == 4) {
            divResponse.innerHTML = xhttp.responseText;
        }
    };
    xhttp.open("GET", "AsistenciaTable.php?grupo="+grupo+"&materia="+materia+"&unidad="+unidad+"&asignatura="+asignatura, true);
    xhttp.send();
}

function updateAsistencia(bit, alumno, fecha, materia) {
    var ajax = new XMLHttpRequest();
    ajax.open("GET", "../../model/asistenciaUpdate.php?fecha="+fecha+"&matricula="+alumno+"&asistencia="+bit+"&materia="+materia, true);
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
            $("#tblEVA").dataTable({
                "aoColumnDefs": [
                    { "bSortable": false, "aTargets": [ 9 ] }, //para que no use las columnas donde se encuentran los botones eliminar
                    { "bSearchable": false, "aTargets": [ 9 ] } //para que no use las columnas donde se encuentran los botones eliminar
                ],
                "language": {
                    "sInfoFiltered": "(filtrado de un total de _MAX_ alumnos)",
                    "sInfo": "Del _START_ al _END_ de un total de _TOTAL_ alumnos",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "Ningún dato disponible en esta tabla",
                    "sLoadingRecords": "Cargando...",
                    "sLengthMenu": "Mostrar _MENU_ alumnos",
                    "sSearch": "Buscar:",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast" : "Último",
                        "sNext" : "Siguiente",
                        "sPrevious" : "Anterior"
                    }
                },
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'pdf',
                        key: 'p',
                        altKey: true
                    },
                    {
                        extend: 'excel',
                        key: 'x',
                        altKey: true
                    },
                    {
                        extend: 'pageLength',
                        text: '# de Filas'
                    }
                ]
            });
        }
    }
    xhttp.open("GET", "EVA.php?grupo="+grupo+"&materia="+materia+"&unidad="+unidad+"&asignatura="+asignatura, true);
    xhttp.send();
}

function validarFechas(FI, FF) {
    if (FI != '' && FF != '') {
        $("#btnSaveFechas").prop('disabled', false);
    } else {
        $("#btnSaveFechas").prop('disabled', true);
    }
}

$(document).ready(function() {
    $("#divResponse").on("change", "#FI", function(e) {
        var FI = $(this).val();
        var FF = $("#FF");
        if (FF.val() < FI) {
            FF.val('');    
        }
        FF.attr('min', FI);
        validarFechas(FI, FF.val());
    });

    $("#divResponse").on("change", "#FF", function(e) {
        var FI = $("#FI").val();
        var FF = $("#FF").val();
        validarFechas(FI, FF); 
    });

    $("#divResponse").on("click", "#btnSaveFechas", function(e) {
        var FI = $("#FI").val();
        var FF = $("#FF").val();
        var grupo = $('#grupo').html();
        var materia = $('#materia').html();
        var asignatura = $('#asignatura').html();
        if (FI < FF) {
            var unidad = $("#unidad").val();
            console.log(unidad);
            $.ajax({
                url: "../../model/UpdateFechasUnidad.php",
                type: "POST",
                dataType: "HTML",
                data: {
                    FI: FI,
                    FF: FF,
                    unidad: unidad
                }
            }).done(function(data){
                $('#fechas').modal('hide');
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
                getCalendar(materia, grupo, asignatura);
            });  
        } else {
            alert("¡La fecha final no puede ser menor a la fecha de inicio!");
        }
        
        //console.log("UPDATE unidades SET fechainicio = "+FI+". fechafin ="+FF+" WHERE id = "+unidad);
    });
});
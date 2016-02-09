//obtiene las unidades de cada materia y las muestra en el div "unidades" de la página Asistencia.php
function getUnidadesByMateria(materia, grupo) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        var divUnidades = document.getElementById('unidades');
        divUnidades.innerHTML = "Cargando...";
        if(xhttp.readyState == 4) {
            divUnidades.innerHTML = xhttp.responseText;
        }
    };
    xhttp.open("GET", "AsistenciaUnid.php?materia="+materia+"&grupo="+grupo, true);
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

function getEva(materia, grupo) {
    var unidad = document.getElementById("unidad").value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        var divResponse = document.getElementById('divResponse');
        divResponse.innerHTML = "Cargando...";
        if(xhttp.readyState == 4) {
            divResponse.innerHTML = xhttp.responseText;
        }
    }
    xhttp.open("GET", "EVA.php?grupo="+grupo+"&materia="+materia+"&unidad="+unidad, true);
    xhttp.send();
}

$(document).ready(function() {
    $('#divResponse').on('change', '.cal_saber', function(e) {
        var name = $(this).attr('name');
        var saber = $(this).val();
        console.log(name);
        $(this).siblings('.cal_total').val("123");
    });
});
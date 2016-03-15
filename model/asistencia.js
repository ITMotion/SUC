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
    console.log(materia);
    console.log(grupo);
    var unidad = document.getElementById("unidad").value;
    console.log(unidad);
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
                keys: true,
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

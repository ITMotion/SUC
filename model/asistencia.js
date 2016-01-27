//obtiene los grupos que existen en cada división
function getGruposByCarrera(carrera) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        var divGrupos = document.getElementById('grupos');
        divGrupos.innerHTML = "Cargando...";
        if(xhttp.readyState == 4) {
            divGrupos.innerHTML = xhttp.responseText;
        }
    };
    xhttp.open("GET", "AsistenciaGrupo.php?carrera="+carrera, true);
    xhttp.send();
}

//obtiene las materias por cada grupo y las muestra en un select por medio de ajax
function getMateriasByGrupo(grupo) { 
	var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    	var divMaterias = document.getElementById('materias');
    	divMaterias.innerHTML = "Cargando...";
    	if(xhttp.readyState == 4) {
    		divMaterias.innerHTML = xhttp.responseText;
    	}
    };
    xhttp.open("GET", "AsistenciaMat.php?grupo="+grupo, true);
    xhttp.send();
}


//obtiene las unidades de cada materia y las muestra en el div "unidades" de la página Asistencia.php
function getUnidadesByMateria(materia) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        var divUnidades = document.getElementById('unidades');
        divUnidades.innerHTML = "Cargando...";
        if(xhttp.readyState == 4) {
            divUnidades.innerHTML = xhttp.responseText;
        }
    };
    xhttp.open("GET", "AsistenciaUnid.php?materia="+materia, true);
    xhttp.send();
}

//obtiene el calendario consultando la tabla de gruposmaterias y de unidades
function getCalendar(){
    var grupo = document.getElementById("grupo").value;
    var materia = document.getElementById("materia").value;
    var unidad = document.getElementById("unidad").value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        var tableAsistencia = document.getElementById('tableAsistencia');
        tableAsistencia.innerHTML = "Cargando...";
        if(xhttp.readyState == 4) {
            tableAsistencia.innerHTML = xhttp.responseText;
        }
    };
    xhttp.open("GET", "AsistenciaTable.php?grupo="+grupo+"&materia="+materia+"&unidad="+unidad, true);
    xhttp.send();
}
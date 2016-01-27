function getMateria(clave) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    	var divGrupos = document.getElementById('Part2');
    	divGrupos.innerHTML = "Cargando...";
    	if(xhttp.readyState == 4) {
    		divGrupos.innerHTML = xhttp.responseText;
    	}
    };
    xhttp.open("GET", "AlumnosFrm2.php?codigo="+clave, true);
    xhttp.send();
}

function EditAlumnos(matricula) {  
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        var divPanel = document.getElementById('panel');
        divPanel.innerHTML = "Cargando...";
        if(xhttp.readyState == 4) {
            divPanel.innerHTML = xhttp.responseText;
        }
    };
    xhttp.open("GET", "../views/AlumnosPanel.php?matricula="+matricula, true);
    xhttp.send();
}

function getGrupo(matricula) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        var divGrupos = document.getElementById('Part2');
        divGrupos.innerHTML = "Cargando...";
        if(xhttp.readyState == 4) {
            divGrupos.innerHTML = xhttp.responseText;
        }
    };
    xhttp.open("GET", "../views/EditAlumnosFrm2.php?matricula="+matricula, true);
    xhttp.send();
}
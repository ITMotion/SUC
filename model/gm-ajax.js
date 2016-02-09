function getMateria(clave) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    	var divGrupos = document.getElementById('Part2');
    	divGrupos.innerHTML = "Cargando...";
    	if(xhttp.readyState == 4) {
    		divGrupos.innerHTML = xhttp.responseText;
    	}
    };
    xhttp.open("GET", "GruposMateriasFrm2.php?codigo="+clave, true);
    xhttp.send();
}

function getInfoAssignment(id) {  
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        var divPanel = document.getElementById('paneldias');
        divPanel.innerHTML = "Cargando...";
        if(xhttp.readyState == 4) {
            divPanel.innerHTML = xhttp.responseText;
        }
    };
    xhttp.open("GET", "GruposMateriasPanel.php?clave="+id, true);
    xhttp.send();
}

function deleteAssignment(id) {
    if (confirm("¿De verdad deseas eliminar la asignatura?")) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            var divPanel = document.getElementById('deleteMessage');
            divPanel.innerHTML = "Cargando...";
            location.reload();
            if(xhttp.readyState == 4) {
                divPanel.innerHTML = xhttp.responseText;
            }
        };
        xhttp.open("GET", "GruposMateriasDelete.php?clave="+id, true);
        xhttp.send();
    };
}

function EnlaceGrupos(clave) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        var divGrupos = document.getElementById('grupoenlace');
        divGrupos.innerHTML = "Cargando...";
        if(xhttp.readyState == 4) {
            divGrupos.innerHTML = xhttp.responseText;
        }
    };
    xhttp.open("GET", "../views/GruposMateriasEnlace.php?clave="+clave, true);
    xhttp.send();
}

function EnlaceMaterias(clave) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        var divGrupos = document.getElementById('grupoenlace');
        divGrupos.innerHTML = "Cargando...";
        if(xhttp.readyState == 4) {
            divGrupos.innerHTML = xhttp.responseText;
        }
    };
    xhttp.open("GET", "../views/materiasEnlace.php?clave="+clave, true);
    xhttp.send();
}

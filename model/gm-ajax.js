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

function getInfoAssignment() {
    alert("hola");
}
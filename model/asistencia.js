//obtiene las materias por cada división y las muestra en un select por medio de ajax
function getMateriasByCarrera(carrera) { 
	var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    	var divMaterias = document.getElementById('materias');
    	divMaterias.innerHTML = "Cargando...";
    	if(xhttp.readyState == 4) {
    		divMaterias.innerHTML = xhttp.responseText;
    	}
    };
    xhttp.open("GET", "AsistenciaMat.php?carrera="+carrera, true);
    xhttp.send();
}
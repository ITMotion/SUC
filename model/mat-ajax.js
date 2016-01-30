function calUnidades(unidades) {
	var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    	var calUnidades = document.getElementById('calUnidades');
    	calUnidades.innerHTML = "Cargando...";
    	if(xhttp.readyState == 4) {
    		calUnidades.innerHTML = xhttp.responseText;
    	}
    };
    xhttp.open("GET", "MateriasFrm2.php?unidades="+unidades, true);
    xhttp.send();
}
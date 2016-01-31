function deleteCarreras(clave) {
    if (confirm("¿Seguro que deseas eliminar la carrera?")) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            var divPanel = document.getElementById('deleteMessage');
            divPanel.innerHTML = "Cargando...";
            if(xhttp.readyState == 4) {
                divPanel.innerHTML = xhttp.responseText;
            }
        };
        xhttp.open("GET", "CarrerasDelete.php?codigo="+clave, true);
        xhttp.send();
    };
}
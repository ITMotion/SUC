function deleteMateria(id) {
	if (confirm("¿Deseas eliminar la materia? Todos los registros de asistencia se eliminarán")) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            var divPanel = document.getElementById('deleteMessage');
            divPanel.innerHTML = "Cargando...";
            if(xhttp.readyState == 4) {
                divPanel.innerHTML = xhttp.responseText;
            }
        };
        xhttp.open("GET", "MateriasDelete.php?clave="+id, true);
        xhttp.send();
    };
}
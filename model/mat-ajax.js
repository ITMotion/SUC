function deleteMateria(id) {
	if (confirm("¿Deseas eliminar la materia? Todos los registros de asistencia se eliminarán")) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            var divPanel = document.getElementById('deleteMessage');
            divPanel.innerHTML = "Cargando...";
            if(xhttp.readyState == 4) {
                location.reload();
                divPanel.innerHTML = xhttp.responseText;
            }
        };
        xhttp.open("GET", "MateriasDelete.php?clave="+id, true);
        xhttp.send();
    };
}

function verMateria(id) {
    $.ajax({
        url : 'MateriaConsultar.php',
        data : { 'materia' : id },
        type : 'GET',
        dataType : 'html',
 
        // código a ejecutar si la petición es satisfactoria;
        success : function(respuesta) {
            $('#verMateria').html(respuesta);
        },
 
        // código a ejecutar si la petición falla;
        error : function(xhr, status) {
            alert('Disculpe, existió un problema');
        },
    });

}
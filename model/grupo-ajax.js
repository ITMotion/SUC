function getGrupo(clave) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        var divGrupos = document.getElementById('Part2');
        divGrupos.innerHTML = "Cargando...";
        if(xhttp.readyState == 4) {
            divGrupos.innerHTML = xhttp.responseText;
        }
    };
    xhttp.open("GET", "GrupoFrm2.php?clave="+clave, true);
    xhttp.send();
}

function deleteGrupo(grupo) {
    if (confirm("¿De verdad deseas eliminar el grupo? Se eliminaran permanentemente los registros de alumnos y de asistencia correspondientes a este grupo. ¡Sobre aviso no hay engaño!")) {
         var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            var divPanel = document.getElementById('deleteMessage');
            divPanel.innerHTML = "Cargando...";
            if(xhttp.readyState == 4) {
                location.reload();
                divPanel.innerHTML = xhttp.responseText;
            }
        };
        xhttp.open("GET", "GruposDelete.php?grupo="+grupo, true);
        xhttp.send();
    };
}

function EnlaceCarrera(carrera) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        var divGrupos = document.getElementById('grupoenlace');
        divGrupos.innerHTML = "Cargando...";
        if(xhttp.readyState == 4) {
            divGrupos.innerHTML = xhttp.responseText;
        }
    };
    xhttp.open("GET", "CarreraEnlace.php?carrera="+carrera, true);
    xhttp.send();
}

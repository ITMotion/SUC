function getGrupo(clave) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        var divGrupos = document.getElementById('Part2');
        divGrupos.innerHTML = "Cargando...";
        if(xhttp.readyState == 4) {
            divGrupos.innerHTML = xhttp.responseText;
        }
    };
    xhttp.open("GET", "../views/GrupoFrm2.php?clave="+clave, true);
    xhttp.send();
}

function getGrupo2(grupo) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        var divGrupos = document.getElementById('Part2');
        divGrupos.innerHTML = "Cargando...";
        if(xhttp.readyState == 4) {
            divGrupos.innerHTML = xhttp.responseText;
        }
    };
    xhttp.open("GET", "../views/EditGrupoFrm2.php?grupo="+grupo, true);
    xhttp.send();
}

function deleteGrupo(grupo) {
    if (confirm("¿De verdad deseas eliminar el grupo? Se eliminaran permanentemente los registros de alumnos y de asistencia correspondientes a este grupo. ¡Sobre aviso no hay engaño!")) {
        window.location = "gruposDelete.php?grupo="+grupo;
    };
}
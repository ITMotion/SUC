﻿function getGrupo(clave) {
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

function EditGrupos(clave) {  
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        var divPanel = document.getElementById('panel');
        divPanel.innerHTML = "Cargando...";
        if(xhttp.readyState == 4) {
            divPanel.innerHTML = xhttp.responseText;
        }
    };
    xhttp.open("GET", "../views/grupoPanel.php?clave="+clave, true);
    xhttp.send();
}

function deleteGrupo(clave) {
    if (confirm("¿De verdad deseas eliminar el grupo?")) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            var divPanel = document.getElementById('deleteMessage');
            divPanel.innerHTML = "Cargando...";
            if(xhttp.readyState == 4) {
                divPanel.innerHTML = xhttp.responseText;
            }
        };
        xhttp.open("GET", "gruposDelete.php?clave="+clave, true);
        xhttp.send();
    };
}
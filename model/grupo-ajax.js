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
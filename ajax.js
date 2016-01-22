var miAjax;
var btn = document.getElementById('run');
btn.onclick = function() {
    var idGrupo = document.getElementById("grupo").value;
	var idMateria = document.getElementById("materia").value;
	var fecha = document.getElementById("fecha").value;
    consultarAjax(idGrupo, idMateria, fecha);
    $('#tblAS').dataTable();
};
function crearAjax(){
	var xmlHttp=null;
	if (window.ActiveXObject) {
		xmlHttp = new ActiveXObject('Microsoft.XMLHTTP');
	}
	else {
		if (window.XMLHttpRequest) {
			xmlHttp = new XMLHttpRequest();
		};
	}
	return xmlHttp;
}
function consultarAjax(idGrupo, idMateria, fecha){
	var miAjax = new XMLHttpRequest();
	miAjax.onreadystatechange = function() {
		var divRes = document.getElementById("tblAsistencia");
		divRes.innerHTML = "Cargando...";
		if(miAjax.readyState == 4 && miAjax.status == 200) {
			divRes.innerHTML = miAjax.responseText;
		}
	};
	miAjax.open("GET", "datos.php?idGrupo="+idGrupo+"&idMateria="+idMateria+"&fecha="+fecha, true);
	miAjax.send();
}
function updateAsistencia(asistencia, matricula, fecha, materia) {
	var ajax = new XMLHttpRequest();
	ajax.open("GET", "updateAsistencia.php?fecha="+fecha+"&matricula="+matricula+"&asistencia="+asistencia+"&materia="+materia, true);
	ajax.send();
	alert("Registro Actualizado");
}
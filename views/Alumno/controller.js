$(document).ready(function () {
	$(".controlador").click(function() {
		var valor = $(this).html();
		if(valor == "Calificaciones") {
			controlador(1);
		}
		if(valor == "Asistencia") {
			controlador(2);
		}
		$("li").removeClass("active");	
		$(this).parent().closest("li").addClass("active");
	});

	$("#content").on("click", ".card", function(e) {
		var asignatura = $(this).find(".idAsignatura").html();
		var materia = $(this).find(".materia").html();
		var profesor = $(this).find(".profesor").html();
		$.ajax({
			url: "DetalleCalificaciones.php",
			type: "POST",
			dataType: "HTML",
			data: {
				asignatura: asignatura,
				materia: materia,
				profesor: profesor
			}
		}).done(function(data) {
			$("#content").fadeOut(200, function(){
				$(this).html(data).fadeIn(200);
			});
		});
	});
});

function controlador(direccion) {
	if (direccion == 1) {
		$.ajax({
			url: "Calificaciones.php",
			type: "POST",
			dataType: "HTML",
		}).done(function(data){
			$("#content").fadeOut(200, function(){
				$(this).html(data).fadeIn(200);
			});
		});
	}
	if (direccion == 2) {
		$.ajax({
			url: "Asistencia.php",
			type: "POST",
			dataType: "HTML",
		}).done(function(data){
			$("#content").fadeOut(200, function(){
				$(this).html(data).fadeIn(200);
			});
		});
	}
}
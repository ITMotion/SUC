$(document).ready(function () {
	$(".controlador").click(function() {
		$valor = $(this).html();
		if($valor == "Calificaciones") {
			$.ajax({
				url: "Calificaciones.php",
				type: "POST",
				dataType: "HTML",
			}).done(function(data){
				$("#content").empty();
				$("#content").html(data);
			});
		}
		if($valor == "Asistencia") {
			$.ajax({
				url: "Asistencia.php",
				type: "POST",
				dataType: "HTML",
			}).done(function(data){
				$("#content").empty();
				$("#content").html(data);
			});
		}
		$("li").removeClass("active");	
		$(this).parent().closest("li").addClass("active");
	});
});
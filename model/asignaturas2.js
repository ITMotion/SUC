$(document).ready(function() {
	var alertDelete = $("#alertDelete");

	$(".delete").click(function() {
		var boton = $(this);
		if(confirm("¿Desea eliminar la asignatura?")){
			var assignment = $(this).parent().find(".asignatura").html();
			console.log(assignment);
			$.ajax({
				url: "../../model/Profesor/eliminarAsignatura.php",
				type: "POST",
				dataType: "json",
				data: {
					assignment: assignment
				}
			}).done(function(data) {
				console.log(data.status);
				if (data.status == 1) {
					console.log("Eliminado!");
					boton.closest("tr").remove();
					alertDelete.show(600);
				} else {
					alert("¡Ocurrió un error!");
				}
			});
		}
	});
});
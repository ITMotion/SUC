$(document).ready(function(){
	$(".btnDelete").click(function() { //para eliminar un profesor de la tabla
		if (confirm("¿Deseas eliminar el profesor seleccionado?")) { //primero pregunta si está seguro
			var matricula = $(this).parent().parent().find(".matricula").html();
			$.ajax({
				url: "../model/prfDelete.php",
				type: "POST",
				dataType: "HTML",
				data: {
					matricula: matricula
				}
			}).done(function(data){
				$("#deleteMessage").empty();
				$("#deleteMessage").html(data);
			});
			$(this).closest("tr").remove();
		}
	});
	$(".btnEdit").click(function(){
		
	});
})
$(document).ready(function() {
	$("#content").on("click", "#btnModificar", function(e) {
		e.preventDefault();

		$(".form-control").prop("disabled", false);

		var btnCancelar = $("#btnCancelar");
		btnCancelar.prop("disabled", false);
		btnCancelar.show();

		var btnGuardar = $("#btnGuardar");
		btnGuardar.show();

		$(this).hide();
		$(this).prop("disabled", true);
	});

	$("#content").on("click", "#btnCancelar", function() {
		$(".form-control").prop("disabled", true);

		var btnGuardar = $("#btnGuardar");
		btnGuardar.prop("disabled", true);
		btnGuardar.hide();

		var btnModificar = $("#btnModificar");
		btnModificar.prop("disabled", false);
		btnModificar.show();

		$(this).prop("disabled", true);
		$(this).hide();
	});

	$("#content").on("submit", "form", function(e) {
		e.preventDefault();
		$.ajax({
			url: "../../model/Alumno/updateProfile.php",
			type: "POST",
			dataType: "JSON",
			data: $(this).serialize()
		}).done(function(data){
			$(".form-control").prop("disabled", true);
			$("#btnGuardar").prop("disabled", true);
			$("#btnCancelar").prop("disabled", true);
			$("#btnModificar").prop("disabled", false);
			mostrarAlerta(data.status);
		});
	});

	$("#content").on("change", ".form-control", function() {
		var btnGuardar = $("#btnGuardar");
		if($(this).val() == "")
		{
			btnGuardar.prop("disabled", true);
		} else {
			btnGuardar.prop("disabled", false);
		}
	});


	$("#content").on("change", "#password", function() {
		var oldPassword = $("#contraseñaAnterior");
		if ($(this).val() != "") {
			oldPassword.slideDown("slow");
			oldPassword.find("#oldPassword").attr("required", true);
		} else {
			oldPassword.slideToggle("slow");
			oldPassword.find("#oldPassword").attr("required", false);
		}
	});
});

function mostrarAlerta(status) {
	$.ajax({
		url: "Alertas.php",
		type: "POST",
		dataType: "HTML",
		data : {
			alerta: status
		}
	}).done(function(data) {
		$("#divAlertas").html(data);
		$("#divAlertas").show(600);
	});
}
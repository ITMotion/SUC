$(document).ready(function() {
	$("#btnModificar").click(function(e) {
		e.preventDefault();
		$(".form-control").prop("disabled", false);
		$("#btnCancelar").prop("disabled", false);
		$(this).prop("disabled", true);
	});

	$("#btnCancelar").click(function() {
		$(".form-control").prop("disabled", true);
		$("#btnGuardar").prop("disabled", true);
		$("#btnModificar").prop("disabled", false);
		$(this).prop("disabled", true);
	});

	$(".form-control").change(function() {
		if($(this).val() == "")
		{
			$("#btnGuardar").prop("disabled", true);
		} else {
			$("#btnGuardar").prop("disabled", false);
		}
	});

	$("#password").change(function() {
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
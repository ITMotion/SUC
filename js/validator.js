$(document).ready(function () {
	$('#ContactForm').validate({ // initialize the plugin
		rules: {
			nombre: {
				required: true
			},
			apellidos: {
				required: true
			},
			correo: {
				required: true,
				email: true
			}
		},
	});
});
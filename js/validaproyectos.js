$(document).ready(function () {
	$('#projects-form').validate({
		lang: 'es',
		rules: {
			nombre: {
				required: true
			},
			proyecto: {
				required: true
			},
			correo: {
				required: true,
				email: true
			},
			descripcion: {
				required: true,
				minlength: 10
			}
		},
	});
});
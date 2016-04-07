<?php
	$alerta = $_POST['alerta'];

	switch ($alerta) {
		case 1:
			$class = "alert-success";
			$mensaje = "Sus datos se han guardado correctamente.";
			break;
		case 2:
			$class = "alert-danger";
			$mensaje = "Ocurrió un problema, lo sentimos.";
			break;
		case 3:
			$class = "alert-danger";
			$mensaje = "La contraseña anterior no coincide con lo que ingresaste, favor de corregir.";
			break;
		case 4:
			$class = "alert-warning";
			$mensaje = "Su contraseña se actualizó correctamente, sin embargo, hemos tenido problemas para actualizar su correo. Intente de nuevo.";
			break;

		case 5: 
			$class = "alert-warning";
			$mensaje = "Su correo se actualizó correctamente, sin embargo, hemos tenido problemas para actualizar su contraseña. Intente de nuevo.";
			break;

		default:
			$class = "alert-danger";
			$mensaje = "Ocurrió un problema, lo sentimos.";
			break;
	}
?>
<div class="alert <?php echo $class; ?>">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<?php echo $mensaje; ?>
</div>
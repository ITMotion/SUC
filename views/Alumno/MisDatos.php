<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>SUC: Sistema Único de Calificaciones - Alumno</title>

	<!--jQuery-->
	<script type="text/javascript" charset="UTF-8" src="../../js/jquery.js"></script>

	<!--Bootstrap-->
	<link rel="stylesheet" href="../../css/bootstrap.min.css">
	<script src="../../js/bootstrap.min.js"></script>

	<!-- Recursos de está página -->
	<script src="MisDatos.js"></script>
	<style>
		#btnModificar {
			margin-right: 1%;
		}
		h2 {
			text-align: center;
		}

		#contraseñaAnterior {
			display: none;
		}
	</style>
</head>
<body>
	<?php 
		require_once("Menu.php");
	?>
	<div class="container">
		<div class="row">
			<h2><?php echo $user[0]->nombres . " ". $user[0]->paterno . " " . $user[0]->materno; ?></h2>
		</div>
		<br />
		<form action="../../model/Alumno/updateProfile.php" method="POST" class="form-horizontal">

			<div class="form-group">
				<label for="email" class="sr-only">Email:</label>
				<div class="input-group">
					<div class="input-group-addon"><span class="glyphicon glyphicon-envelope" ></span></div>
					<input type="email" name="email" id="email" class="form-control" placeholder="<?php echo $user[0]->correo; ?>" disabled="true">
				</div>
			</div>

			<div class="form-group">
				<label for="password" class="sr-only">Contraseña:</label>
				<div class="input-group">
					<div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
					<input type="password" id="password" name="password" class="form-control" placeholder="Ingrese una nueva contraseña" disabled="true">
				</div>
			</div>

			<div class="form-group" id="contraseñaAnterior">
				<label for="oldPassword" class="sr-only">Contraseña anterior:</label>
				<div class="input-group">
					<div class="input-group-addon"><span class="glyphicon glyphicon-hourglass"></span></div>
					<input type="password" id="oldPassword" name="oldPassword" class="form-control" placeholder="Ingrese su contraseña anterior">
				</div>
			</div>
			
			<button type="submit" class="btn btn-primary pull-right" id="btnGuardar" disabled="true"><span class="glyphicon glyphicon-save"></span> Guardar</button>
			<button class="btn btn-info pull-right" id="btnModificar"><span class="glyphicon glyphicon-edit"></span> Modificar</button>
			<button class="btn btn-warning" id="btnCancelar" disabled="true"><span class="glyphicon glyphicon-trash"></span> Cancelar</button>
		</form>
	</div>
</body>
</html>
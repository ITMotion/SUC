<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SUC: Sistema Único de Calificaciones - Carreras</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

	<?php require_once("../../model/SesionAdministrador.php"); // control de sesiones ?>

	<!-----------------------Recursos de Bootstrap-------------------------->
	<link rel="stylesheet" href="../../css/bootstrap.min.css">
	<script type="text/javascript" charset="UTF-8" src="../../js/jquery.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
	<script src="../../js/scripts.js"></script>
	<!--------------------------Fin recursos de bootstrap-------------------------->

</head>
<body>
	<?php include_once("../Menu.html"); ?>
	<div class="container">
		<form action="../../model/carrera-crear.php" method="POST" class="form-horizontal">
			<div class="form-group">
				<label for="carrera">Carrera</label>
				<input type="text" placeholder="Ingrese la carrera" name="carrera" id="carrera" class="form-control">
			</div>
			<button class="btn btn-primary pull-right">Guardar</button>
		</form>
	</div>
</body>
</html>

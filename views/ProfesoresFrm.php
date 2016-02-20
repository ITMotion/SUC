<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SUC: Sistema Único de Calificaciones - Profesores</title>
	<?php require_once("../model/SesionAdministrador.php"); ?> <!--Control de sesiones-->

	<!-----------------------Recursos de Bootstrap-------------------------->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<script type="text/javascript" charset="UTF-8" src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/scripts.js"></script>
	<!--------------------------Fin recursos de bootstrap-------------------------->

</head>
<body>
	<?php include_once("Menu.html"); ?>
	<div class="container">
		<h1>Agregar Nuevo Profesor</h1>
		<form action="../model/prfAgregar.php" method="POST">
			<div class="form-group">
				<label for="matricula">Matricula:</label>
				<input type="number" name="matricula" id="matricula" placeholder="Ingrese los 8 caracteres de la matrícula" class="form-control" required="true" max="19999999" min="10000000">
			</div>

			<div class="form-group">
				<label for="nombre">Nombres:</label>
				<input type="text" name="nombres" id="nombres" placeholder="Ingrese los nombres del profesor" class="form-control" required>
			</div>

			<div class="form-group">
				<label for="paterno">Apellido Paterno:</label>
				<input type="text" name="paterno" id="paterno" placeholder="Ingrese el apellido paterno del profesor" class="form-control" required>
			</div>

			<div class="form-group">
				<label for="materno">Apellido Materno:</label>
				<input type="text" name="materno" id="materno" placeholder="Ingrese el apellido materno del profesor" class="form-control" required>
			</div>

			<div class="form-group">
				<label for="email">Correo:</label>
				<input type="email" name="email" id="email" placeholder="Ingrese el correo electrónico del profesor" class="form-control" required>
			</div>

			<div class="form-group">
				<label for="tipo">Tipo:</label>
				<select name="tipo" id="tipo" class="form-control">
					<option value="1">Profesor de Tiempo Completo</option>
					<option value="2">Profesor de Asignatura</option>
				</select>
			</div>

			<button class="btn btn-primary pull-right">Agregar</button>
			<a href="Profesores.php" class="btn btn-warning">Cancelar</a>
		</form>
	</div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SUC - Sistema Único de Calificaciones - Profesores</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<?php require_once("../../model/SesionAdministrador.php"); ?> <!--Control de sesiones-->

	<!-----------------------Recursos de Bootstrap-------------------------->
	<link rel="stylesheet" href="../../css/bootstrap.min.css">
	<script type="text/javascript" charset="UTF-8" src="../../js/jquery.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
	<script src="../../js/scripts.js"></script>
	<!--------------------------Fin recursos de bootstrap-------------------------->

	<?php
		if (isset($_GET['mat'])) {
			include_once("../../model/DAOprofesores.php");
			$dbprofesores = new DAOprofesores();
			$profesor = $dbprofesores->getInfoProfesor($_GET['mat']);
	?>
</head>
<body>
	<?php include_once("../Menu.html"); ?>
	<div class="container">
		<?php if (!is_null($profesor)) { ?>
			<form action="../../model/prfEdit.php" method="POST">

				<input type="hidden" name="matricula" value="<?php echo $profesor[0]->matricula ?>" required>

				<div class="form-group">
					<label for="nombres">Nombres:</label>
					<input type="text" name="nombres" id="nombres" placeholder="<?php echo $profesor[0]->nombres ?>" required class="form-control">
				</div>

				<div class="form-group">
					<label for="paterno">Apellido Paterno:</label>
					<input type="text" name="paterno" placeholder="<?php echo $profesor[0]->paterno ?>" required class="form-control">
				</div>

				<div class="form-group">
					<label for="matero">Apellido Materno:</label>
					<input type="text" name="materno" placeholder="<?php echo $profesor[0]->materno ?>" required class="form-control">
				</div>

				<div class="form-group">
					<label for="correo">Correo:</label>
					<input type="email" name="correo" placeholder="<?php echo $profesor[0]->correo; ?>" required class="form-control">
				</div>

				<div class="form-group">
					<label for="tipo">Tipo de Profesor:</label>
					<select name="tipo" id="tipo" class="form-control">
						<option value="1">Profesor de Tiempo Completo</option>
						<option value="2">Profesor de Asignatura</option>
					</select>
				</div>
				<button class="btn btn-primary pull-right">Aceptar</button>
				<a class="btn btn-warning" href="Profesores.php">Cancelar</a>
			</form>
		<?php } else { ?>
			<h1>No existe el profesor seleccionado</h1>
			<a class="btn btn-warning" href="Profesores.php">Regresar</a>
		<?php  } ?>
	</div>
	<?php } else {  header("Location: Profesores.php");  } ?>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once("../../model/SesionProfesor.php"); ?> <!--Contról de Sesiones-->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	
	<title>SUC: Sistema Único de Calificaciones - Alumnos</title>

	<!--jQuery-->
	<script type="text/javascript" charset="UTF-8" src="../../js/jquery.js"></script>

	<!--Bootstrap-->
	<link rel="stylesheet" href="../../css/bootstrap.min.css">
	<script src="../../js/bootstrap.min.js"></script>

	<!-- Recursos de esta página -->
	

	<?php  
		require_once("../../model/DAOalum.php");
		$dbAlumnos = new DAOalum();
		$asignaturas = $dbAlumnos->obtenerGruposPorProfesor($_SESSION['user']);
	?>
</head>
<body>
	<?php require_once("Menu.php");	 ?>
	<div class="container">
		<h1>Agregar Alumno</h1>
		<?php 
			if (is_null($asignaturas)) {
		?>
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Alerta!</strong> No tienes ningún grupo asignado, por favor crea una <a href="AsignaturasFrm.php">asignatura</a>
			</div>
		<?php
			} else {
		 ?>
			<form action="../../model/Profesor/crearAlumno.php" method="POST">
				<div class="form-group">
					<label for="grupo">* Grupo</label>
					<select name="grupo" class="form-control">
						<?php foreach ($asignaturas as $asignatura): ?>
							<option><?php echo $asignatura->idgrupo ?></option>
						<?php endforeach ?>
					</select>
				</div>

				<div class="form-group">
					<label for="nombres">* Nombre/s del alumno</label>
					<input type="text" name="nombres" placeholder="Nombres" required="true" class="form-control">
				</div>

				<div class="form-group">
					<label for="paterno">* Apellido paterno del alumno</label>
					<input type="text" name="paterno" placeholder="Apellido paterno" required="true" class="form-control">
				</div>
				
				<div class="form-group">
					<label for="materno">* Apellido materno del alumno</label>
					<input type="text" name="materno" placeholder="Apellido materno" required="true" class="form-control">
				</div>

				<div class="form-group">
					<label for="correo">Correo del alumno</label>
					<input type="email" name="correo" placeholder="Correo (opcional)" class="form-control">
				</div>

				<div class="form-group">
					<label for="matricula">Matrícula del alumno (En caso de no ingresar se auto-asignará)</label>
					<input type="number" name="matricula" placeholder="Matrícula Única (Opcional)" class="form-control">	
				</div>

				<button class="btn btn-primary pull-right">Guardar</button>
				<a href="Alumnos.php" class="btn btn-warning">Regresar</a>
			</form>
			<br />
		<?php 
			}
		?>
	</div>
</body>
</html>
<!DOCTYPE html>

<html>
	<head>
		<meta charset="UTF-8">
		<title>SUC (Sistema Unico de Calificaicones)</title>
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<?php
			include_once("../model/DAOprof.php");
			$db = new DAOprof();
			$carreras = $db->getCarreras();
		?>
	</head>
	<body>
		<?php include_once("menu.html") ?>

		<div class="container">
			<h2>Agregar nuevo Profesor</h2>
			<form action="../model/Profesor-asignarProfesor.php" method="POST" class="form-horizontal">
			<div class="form-group">
				<select name="carrera" id="carrera" class="form-control" onchange"getCarreras(value)">
					<?php
						if(!empty($carreras))
						{
							foreach ($carreras as $carrera) 
							{
							echo "<option value='$carrera->codigo'>$carrera->descripcion</option>";
							}
						}
				 	?>
				</select>
			</div>
				<div class="form-group">
		<input name="nombres" id="nombres" class="form-control" placeholder="Ingrese sus nombres">
	</div>

	<div class="form-group">
		<input name="paterno" id="paterno" class="form-control" placeholder="Ingrese su Apellido Paterno">
	</div>

	<div class="form-group">
		<input name="materno" id="materno" class="form-control" placeholder="Ingrese su Apellido Materno">
	</div>

	<div class="form-group">
		<select name="tipo" id="tipo" class="form-control" placeholder="Seleccione el tipo de profesor">
		<option value="PTC">Profesor de Tiempo Completo (PTC)</option>
		<option value="PA">Profesor de Asignatura (PA)</option>
		</select>
	</div>
	<button class="btn btn-primary pull-right">Enviar</button>
			</form>
		</div>
		<script type="text/javascript" charset="UTF-8" src="../js/jquery.js"></script>
		<script type="../js/bootstrap.min.js"></script>
		<script type="../js/scripts.js"></script>
		<script type="../model/alum-ajax.js"></script>		
	</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="en">
	<title>SUC: Sistema Único de Calificaciones - Alumnos</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

	<?php require_once("../../model/SesionAdministrador.php"); ?> <!--Control de sesiones-->

	<!-----------------------Recursos de Bootstrap-------------------------->
	<link rel="stylesheet" href="../../css/bootstrap.min.css">
	<script type="text/javascript" charset="UTF-8" src="../../js/jquery.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
	<script src="../../js/scripts.js"></script>
	<!--------------------------Fin recursos de bootstrap-------------------------->

	<?php
		include_once("../../model/DAOalum.php");
		$db = new DAOalum();
		$carreras = $db->getCarreras();
		if (isset($_GET['success'])) {
			if ($_GET['success']==2) {
				echo "<script> alert('¡Este alumno ya existe!')</script>";
			}
		}
	?>
</head>
<body>
	<?php include_once("../Menu.html") ?>
	<div class="container">
		<h1>Agregar alumno nuevo</h1>
	<?php if (empty($carreras)) { ?>
		<div class="alert alert-warning">
		<button class="close" data-dismiss="alert"><span>&times;</span></button>
		No existen carreras creadas. Crea una <a href="#" onclick="EnlaceAlumnos()">aquí</a>.
	</div>
	<?php
	} else { ?>
		<form action="../../model/Alumnos-asignarAlumno.php" method="POST" class="form-horizontal">
		<div class="form-group">
			<select name="carrera" id="carrera" class="form-control" onchange="getMateria(value)">
				<option value="0">Seleccione una carrera</option>
					<?php
					if(!empty($carreras)){
						foreach ($carreras as $carrera) {
							echo "<option value='$carrera->codigo'>$carrera->descripcion</option>";
						}
					}
					?>
					<?php } ?>
			</select>
		</div>
		<div id="Part2"></div>
		</form>
		<div id="grupoenlace"></div>
	</div>
<script src="../../model/alum-ajax.js"></script>
</body>
</html>

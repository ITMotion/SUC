<!DOCTYPE html>

<html>
	<head>
		<title>SUC Eliminar Información</title>
		<meta charset="UTF-8">
	</head>
	<body>
		<?php

			$matricula = $_POST['$matricula'];

			include_once("../model/DAOprof.php");
			$db = new DAOprof();
			$db->EliminarProfesor($matricula);
		?>
		<a href="#" onmouseDown="alert('ADVERTENSIA')">¿Está Seguro que Desea Eliminar el Registro?</a>

		<div class="alert alert-success cold-md-10">
			<button class="close" data-dismiss="alert"><span>&times;</span></button>
			Registro Eliminado Correctamente
		</div>
	</body>
</html>
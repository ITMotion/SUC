<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SUC: Sistema Único de Calificaciones - Materias</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<?php require_once("../model/SesionAdministrador.php"); ?> <!--Control de sesiones-->

	<!-----------------------Recursos de Bootstrap-------------------------->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<script type="text/javascript" charset="UTF-8" src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/scripts.js"></script>
	<!--------------------------Fin recursos de bootstrap-------------------------->

	<?php
		include_once("../model/DAOgm.php");
		$db = new DAOgm();
		$carreras = $db->getCarreras();
		if (isset($_GET['success'])) {
			if ($_GET['success']==2) {
				echo "<script> alert('¡Ya existe esta asignación!')</script>";
			}
		}
	?>
</head>
<body>
	<?php include_once("Menu.html") ?>
	<div class="container">
		<h1>Asignaturas</h1>
		<form action="../model/gm-asignarMateria.php" method="POST" class="form-horizontal">
			<div class="form-group">
				<select name="carrera" id="carrera" class="form-control" onchange="getMateria(value)">
					<option value="0">Seleccione una carrera</option>
					<?php
					if(!empty($carreras)) {
						foreach ($carreras as $carrera) {
							echo "<option value='$carrera->codigo'>$carrera->descripcion</option>";
						}
					}
					?>
				</select>
			</div>
			<div id="Part2"></div>
		</form>
		<div id="grupoenlace"></div>
	</div>
	<script type="text/javascript" charset="UTF-8" src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/scripts.js"></script>
	<script src="../model/gm-ajax.js"></script>
</body>
</html>

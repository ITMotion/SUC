<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SUC: Sistema Único de Calificaciones</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<?php
		session_start();
		if($_SESSION['permisos'] != 1) {
			if($_SESSION['permisos'] == 2) {
				header('Location: Asistencia.php?unauthorized');
			}
		} 
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
	<?php include_once("menu.html") ?>
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
	</div>
	<script type="text/javascript" charset="UTF-8" src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/scripts.js"></script>
	<script src="../model/gm-ajax.js"></script>
</body>
</html>
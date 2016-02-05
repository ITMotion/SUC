<!DOCTYPE html>
<html>
<head>
	<meta charset="en">
	<title>SUC: Sistema Único de Calificaciones</title>
	<?php require_once("../model/SesionAdministrador.php"); ?> <!--Control de sesiones-->

	<!-----------------------Recursos de Bootstrap-------------------------->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<script type="text/javascript" charset="UTF-8" src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/scripts.js"></script>
	<!--------------------------Fin recursos de bootstrap-------------------------->

	<?php 
		include_once("../model/DAOgrupo.php"); 
		$db = new DAOgrupo();
		$carreras = $db->getCarreras();
		if (isset($_GET['success'])) {
			if ($_GET['success']==2) {
				echo "<script> alert('¡Este grupo ya existe!')</script>";
			}
		}
		
	?>
</head>
<body>
	<?php include_once("menu.html") ?>
	<div class="container">
		<h1>Agregar nuevo grupo</h1>
		<form action="../model/Grupo-asignarGrupo.php" method="POST" class="form-horizontal">
		<div class="form-group">
			<select name="carrera" id="carrera" class="form-control" onchange="getGrupo(value)">
				<option value="0">Seleccione una carrera</option>
					<?php 
					if(!empty($carreras)){	
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
<script src="../model/grupo-ajax.js"></script>
</body>
</html>
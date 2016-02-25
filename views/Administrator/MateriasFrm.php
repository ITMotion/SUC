<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SUC: Sistema Único de Calificaciones - Materias</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<?php require_once("../../model/SesionAdministrador.php"); ?> <!--Control de sesiones-->

	<!-----------------------Recursos de Bootstrap-------------------------->
	<link rel="stylesheet" href="../../css/bootstrap.min.css">
	<script type="text/javascript" charset="UTF-8" src="../../js/jquery.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
	<script src="../../js/scripts.js"></script>
	<!--------------------------Fin recursos de bootstrap-------------------------->

	<?php
		include_once("../../model/DAOmaterias.php");
		$db = new DAOmaterias();
		$carreras = $db->getCarreras();
	?>
</head>
<body>
	<?php include_once("../Menu.html") ?>
	<div class="container">
		<form action="MateriasFrm2.php" method="POST" class="form-horizontal">
			<div class="form-group">
				<label for="descripcion">Materia</label>
				<input type="text" name="descripcion" id="descripcion" placeholder="Ingrese la descripción de la materia" class="form-control">
			</div>

			<div class="form-group">
				<label for="grado">Grado:</label>
				<select name="grado" id="grado" class="form-control">
					<?php for($i=1; $i<13; $i++) { ?>
					<option><?php echo $i; ?></option>
					<?php } ?>
				</select>
			</div>

			<div class="form-group">
				<label for="carrera">Carrera:</label>
				<select name="carrera" id="carrera" class="form-control">
					<?php foreach ($carreras as $carrera): ?>
						<option value="<?php echo $carrera->codigo ?>"><?php echo $carrera->descripcion ?></option>
					<?php endforeach ?>
				</select>
			</div>

			<div class="form-group">
				<label for="unidades">Número de Unidades:</label>
				<select name="unidades" id="unidades" class="form-control" onchange="calUnidades(value)">
					<?php for($i=1; $i<11; $i++) { ?>
						<option><?php echo $i; ?></option>
					<?php } ?>
				</select>
			</div>

			<button class="btn btn-primary pull-right col-md-2">Siguiente</button>
			<a class="btn btn-warning col-md-2" href="Materias.php">Cancelar</a>
		</form>
	</div>
</body>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SUC: Sistema Único de Calificaciones</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<script type="text/javascript" charset="UTF-8" src="../js/jquery.js"></script>
	<script src="../js/jquery-ui.js"></script>
	<link rel="stylesheet" href="../css/jquery-ui.css">
	
	<?php 
		include_once("../model/DAOmaterias.php");
		$db = new DAOmaterias();
		$carreras = $db->getCarreras();
	?>
</head>
<body>
	<?php include_once("Menu.html") ?>
	<div class="container">
		<form action="../model/mat-crear.php" method="POST" class="form-horizontal">
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

			<div class="form-group" id="calUnidades"></div>
		</form>
	</div>
	
	<script src="../model/mat-ajax.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/scripts.js"></script>
</body>
</body>
</html>
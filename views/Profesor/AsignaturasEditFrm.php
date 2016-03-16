<?php require_once("../../model/SesionProfesor.php"); ?> <!--Contról de Sesiones-->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SUC: Sistema Único de Calificaciones</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

	<!-- Recursos de Bootstrap -->
  	<link rel="stylesheet" href="../../css/bootstrap.min.css">
  	<script type="text/javascript" charset="UTF-8" src="../../js/jquery.js"></script>
  	<script src="../../js/bootstrap.min.js"></script>
  	<script src="../../js/scripts.js"></script>
  	<!-- Fin recursos de bootstrap -->
  	<?php  
  		$dias = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes");
  	?>
</head>
<body>
	<?php include_once("Menu.php") ?>
	<div class="container">
		<h1>Editar Asignatura</h1>
		<form class="table">
			<div class="form-group">
				<label for="materia" class="control-label">Materia:</label>
				<select name="materia" id="materia" class="form-control">
					<option value=""></option>
				</select>
			</div>

			<div class="form-group">
				<label for="grupo" class="control-label">Grupo:</label>
				<select name="grupo" id="grupo" class="form-control">

				</select>
			</div>
			
			<div class="form-group">
				<label for="">Días:</label><br/>
				<?php for($i=0; $i<5; $i++) { ?>
				<div class="checkbox-inline">
			    <label>
			      <input type="checkbox" name="dias[]" value="<?php echo mb_strtolower($dias[$i], 'UTF-8') ?>"><?php echo $dias[$i] ?>
			    </label>
				</div>
				<?php } ?>
			</div>

			<button class="btn btn-primary pull-right">Guardar</button>
		</form>
	</div>
</body>
</html>
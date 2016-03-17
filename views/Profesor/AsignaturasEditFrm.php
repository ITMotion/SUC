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
  		if (isset($_GET['a'])) {
  			$idAsignatura = $_GET['a'];
  			if (is_numeric($idAsignatura)) {
  				require_once("../../model/DAOgm.php");
		  		$db = new DAOgm();
		  		$asignatura = $db->getAsignaturaEdit($idAsignatura);
		  		$materias = $db->getMateriasPorCarrera($asignatura[0]->carrera);
		  		$grupos = $db->getGruposPorCarrera($asignatura[0]->carrera);
		  		if (is_null($asignatura)) {
		  			header("Location: Asignaturas.php");
		  		}
  			} else {
  				header("Location: Asignaturas.php");
  			}
  		} else {
  			header("Location: Asignaturas.php");
  		}
  		$dias = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes");
  	?>
</head>
<body>
	<?php include_once("Menu.php") ?>
	<div class="container">
		<h1>Modificar Asignatura</h1>
		<form class="table">
			<div class="form-group">
				<label for="materia" class="control-label">Materia:</label>
				<select name="materia" id="materia" class="form-control">
					<?php foreach ($materias as $materia): ?>
						<option value="<?php echo $materia->clave; ?>" <?php if($materia->clave == $asignatura[0]->materia){ echo "selected"; } ?>><?php echo $materia->descripcion; ?></option>
					<?php endforeach ?>
				</select>
			</div>

			<div class="form-group">
				<label for="grupo" class="control-label">Grupo:</label>
				<select name="grupo" id="grupo" class="form-control" required>
					<?php foreach ($grupos as $grupo): ?>
						<option <?php if($grupo->grupo == $asignatura[0]->grupo) { echo "selected"; } ?>><?php echo $grupo->grupo; ?></option>
					<?php endforeach ?>
				</select>
			</div>

			<div class="form-group">
				<label for="unidades">Cantidad de unidades:</label>
				<select name="unidades" id="unidades" class="form-control" required>
					<?php 
						for ($i=1; $i < 11; $i++) { 
					?>
					<option><?php echo $i; ?></option>
					<?php
						} 
					?>
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
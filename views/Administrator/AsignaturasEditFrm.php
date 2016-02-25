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

	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<?php
		include_once("../../model/DAOgm.php");
		$db = new DAOgm();
		$id = $_GET["id"];
		$lista = $db->getGmDetailedInfo($id);
		$profesores = $db->getProfesores();
		$grupos = $db->getGruposPorCarrera($lista[0]->carrera);
	?>
</head>
<body>
	<?php include_once("../Menu.html") ?>
	<div class="container">
		<form action="../../model/gm-updateGM.php" method="POST" class="form-horizontal">
			<h1 class="col-md-12">Editar Asignatura</h1>

			<!------------------------------------Materia------------------------------------------------------>
			<h3 class="col-md-12"><b>Materia:</b> <?php echo $lista[0]->descripcion; ?></h3>
			<input type="hidden" value="<?php echo $lista[0]->clave; ?>" name="materia">

			<!------------------------------------Grupo------------------------------------------------------>
			<h3 class="col-md-12"><b>Grupo: </b><?php echo $lista[0]->grupo; ?></h3>

			<!------------------------------------Id de la materia---------------------------------------------------->
			<h3 class="col-md-12"><b>Profesor:</b></h3>
			<input type="hidden" value="<?php echo $id ?>" name="id">

			<!------------------------------------Profesor------------------------------------------------------>
			<div class="form-group">
				<select name="profesor" id="profesor" class="form-control">
					<?php
						foreach ($profesores as $profesor) {
							echo "<option value='$profesor->matricula'>". $profesor->nombres . " " . $profesor->paterno . " " . $profesor->materno . "</option>";
						}
					?>
				</select>
			</div>

			<!------------------------------------Dias------------------------------------------------------>
			<h3 class="col-md-12"><b>Días:</b></h3>
			<div class="checkbox col-md-2">
				<label for="">
					<input type="checkbox" name="dias[]" value="lunes">lunes
				</label>
			</div>

			<div class="checkbox col-md-2">
				<label for="">
					<input type="checkbox" name="dias[]" value="martes">martes
				</label>
			</div>

			<div class="checkbox col-md-2">
				<label for="">
					<input type="checkbox" name="dias[]" value="miércoles">miércoles
				</label>
			</div>

			<div class="checkbox col-md-2">
				<label for="">
					<input type="checkbox" name="dias[]" value="jueves">jueves
				</label>
			</div>

			<div class="checkbox col-md-2">
				<label for="">
					<input type="checkbox" name="dias[]" value="viernes">viernes
				</label>
			</div>


			<div class="clearfix"></div>
			<br>


			<button class="btn btn-warning pull-right" style="width: 30%;">Actualizar</button>
			<a class="btn btn-danger" href="GruposMaterias.php" style="width: 30%;">Cancelar</a>
		</form>
	</div>
	<script src="../../model/asignaturas.js"></script>
</body>
</html>

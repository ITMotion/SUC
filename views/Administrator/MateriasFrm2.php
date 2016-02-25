<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SUC: Sistema Único de Calificaciones - Materias</title>
	<?php require_once("../../model/SesionAdministrador.php"); ?> <!--Control de sesiones-->

	<!-----------------------Recursos de Bootstrap-------------------------->
	<link rel="stylesheet" href="../../css/bootstrap.min.css">
	<script type="text/javascript" charset="UTF-8" src="../../js/jquery.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
	<script src="../../js/scripts.js"></script>
	<!--------------------------Fin recursos de bootstrap-------------------------->

	<!----------------------------Recursos para el input de fecha------------------------------------------>
	<script src="../../js/jquery-ui.js"></script>
	<link rel="stylesheet" href="../../css/jquery-ui.css">
	<!----------------------------Fin Recursos para el input de fecha------------------------------------------>
	<?php
		$carrera = $_POST["carrera"];
		$grado = $_POST["grado"];
		$descripcion = $_POST["descripcion"];
		$unidades = $_POST["unidades"];
		for ($i=0; $i < $unidades; $i++) {
	?>
		<script>
			$(function() {
	    		$( "#startUnidad<?php echo $i ?>" ).datepicker({
	    			dateFormat: "yy-mm-dd"
	    		});
		    	$( "#endUnidad<?php echo $i ?>" ).datepicker({
		    		dateFormat: "yy-mm-dd"
		    	});
			});
		</script>
	<?php
		}
	?>
</head>
<body>
	<?php include_once("../Menu.html") ?>
	<div class="container">
		<h1><b>Unidades de la materia:</b> <?php echo $descripcion ?></h1>
		<form action="../../model/mat-crear.php" method="POST" class="form-horizontal">

			<input type="hidden" value="<?php echo $carrera ?>" name="carrera" id="carrera">

			<input type="hidden" value="<?php echo $grado ?>" name="grado" id="carrera">

			<input type="hidden" value="<?php echo $descripcion ?>" name="descripcion" id="carrera">

			<input type="hidden" value="<?php echo $unidades ?>" name="numUnidades" id="numUnidades">

			<?php if(isset($_POST["enlace"])){ ?>
			<input type="hidden" value="asignaturas" name="enlace">

			<?php
				}
				for ($i=0; $i < $unidades; $i++) {
			?>
				<div class="form-group">

					<div class="col-md-1">
						<label for="">Unidad <?php echo $i+1 ?>:</label>
					</div>

					<div class="col-md-5">
								<input type="text" id="startUnidad<?php echo $i ?>" class="form-control"
									placeholder="Fecha inicio de la unidad <?php echo $i+1 ?>" name="fechasinicio[]">
					</div>

					<div class="col-md-1"></div>

					<div class="col-md-5">
						<div class="form-group">
							<input type="text" id="endUnidad<?php echo $i ?>" class="form-control"
								placeholder="Fecha final de la unidad <?php echo $i+1 ?>" name="fechasfinales[]">
						</div>
					</div>
				</div>
			<?php
				}
			?>
			<button class="btn btn-primary pull-right col-md-2">Guardar</button>
			<a class="btn btn-warning col-md-2" href="javascript:window.history.back();">Regresar</a>
		</form>
	</div>
</body>
</html>

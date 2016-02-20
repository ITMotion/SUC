<!DOCTYPE html>
<html>
<head>
	<meta charset="en">
	<title>SUC: Sistema Único de Calificaciones - Grupo</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<?php require_once("../model/SesionAdministrador.php"); ?> <!--Control de sesiones-->

	<!-----------------------Recursos de Bootstrap-------------------------->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<script type="text/javascript" charset="UTF-8" src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/scripts.js"></script>
	<!--------------------------Fin recursos de bootstrap-------------------------->

	<?php 
		$grupo = $_GET['grupo'];
		include_once("../model/DAOgrupo.php"); 
		$db = new DAOgrupo();
		$carreras = $db->getCarreras();
		$list = $db->getGrupos($grupo);
	?>
</head>
<body>
	<?php include_once("menu.html") ?>
	<div class="container">
		<h1>Editar grupo</h1>
		<form action="../model/Grupo-updateGrupo.php" method="POST" class="form-horizontal">
			<div class="form-group">
				
				<input type="hidden" id="grupo" name="grupo" class="form-control" placeholder="<?php echo $list[0]->grupo ?>" value="<?php echo $list[0]->grupo ?>">
				<br>
				<input type="text" id="salon" name="salon" class="form-control" placeholder="ingrese el nuevo salon">
				<br>
				<select name="horario" id="horario" class="form-control">
					<option>matutino</option>
					<option>vespertino</option>
				</select>
				<br>
				<select name="carrera" id="carrera" class="form-control">
				<option value="0">Seleccione una carrera</option>
					<?php 
					if(!empty($carreras)){	
						foreach ($carreras as $carrera) {
							echo "<option value='$carrera->codigo'>$carrera->descripcion</option>";
						}
					}
					?>
			</select>
			<br>
				<button class="btn btn-primary pull-right">Enviar</button>
			</div>	
		</form>
	</div>
<script src="../model/grupo-ajax.js"></script>
</body>
</html>
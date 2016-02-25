<?php
	$carrera = $_GET['codigo'];
	include_once("../../model/DAOalum.php");
	$db = new DAOalum();
	$grupos = $db->getGruposPorCarrera($carrera);
	if (empty($grupos)) {
?>

	<div class="alert alert-warning">
		<button class="close" data-dismiss="alert"><span>&times;</span></button>
		No existen grupos asignados a esta carrera. Asigna uno <a href="#" onclick="EnlaceGrupos(<?php echo $carrera ?>)">aquí</a>.
	</div>
<?php } else { ?>
	<div class="form-group">
		<select name="grupos" id="grupos" class="form-control">
			<?php
				foreach ($grupos as $grupo) {
					echo "<option>$grupo->grupo</option>";
				}
			?>
		</select>
	</div>

	<div class="form-group">
		<input name="nombres" id="nombres" class="form-control" placeholder="ingrese sus nombres">
	</div>

	<div class="form-group">
		<input name="paterno" id="paterno" class="form-control" placeholder="ingrese su apellido paterno">
	</div>

	<div class="form-group">
		<input name="materno" id="materno" class="form-control" placeholder="ingrese su apellido materno">
	</div>

	<div class="group">
		<button class="btn btn-primary pull-right">Enviar</button>
	</div>
<?php } ?>
<script src="../../model/alum-ajax.js"></script>

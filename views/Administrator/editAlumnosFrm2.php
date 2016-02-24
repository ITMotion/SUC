<?php 
	$carrera = $_GET['matricula'];
	include_once("../model/DAOalum.php");
	$db = new DAOalum();
	$grupos = $db->getGruposPorCarrera($carrera);
	if (empty($grupos)) {
?>

	<div class="alert alert-warning">
		<button class="close" data-dismiss="alert"><span>&times;</span></button>
		No existen grupos asignados a esta carrera. Asigna uno <a href="Grupos.php">aquí</a>.
	</div>
<?php } else { ?>
<br>
<div class="form-group">
		<select name="grupo" id="grupo" class="form-control">
			<?php 
				foreach ($grupos as $grupo) {
					echo "<option>$grupo->grupo</option>";
				}
			?>	
		</select>
	</div>

	<div class="group">
		<button class="btn btn-primary pull-right">Enviar</button>
	</div>
<?php } ?>	
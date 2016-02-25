<?php
	$carrera = $_GET['carrera'];
	include_once("../../model/DAOgrupo.php");
	$db = new DAOgrupo();

?>
<form action="../../model/Grupo-asignarGrupo.php" method="POST">

	<input type="hidden" name="carrera" value="<?php echo $carrera ?>">
	<div class="form-group">
		<input name="grupos" id="grupos" class="form-control" placeholder="ingrese nombre de grupo">
	</div>

	<div class="form-group">
		<input name="salon" id="salon" class="form-control" placeholder="ingrese nombre del salon">
	</div>

	<div class="form-group">
		<select name="horario" id="horario" class="form-control">
			<option>matutino</option>
			<option>vespertino</option>
		</select>
	</div>

	<div class="group">
		<button class="btn btn-primary pull-right">Enviar</button>
	</div>
</form>

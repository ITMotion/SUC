<?php 
	$clave = $_GET['clave'];
	include_once("../model/DAOgrupo.php");
	$db = new DAOgrupo();
	
?>


	<div class="form-group">
		<input name="grupo" id="grupo" class="form-control" placeholder="ingrese nombre de grupo">
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

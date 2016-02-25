<?php
	$carrera = $_GET['codigo'];
	include_once("../../model/DAOcarrera.php");
	$db = new DAOcarrera();
	$db->delCarrera($carrera);
?>
<div class="alert alert-success col-md-10">
	<button class="close" data-dismiss="alert"><span>&times;</span></button>
	Se eliminó correctamente la carrera.
</div>

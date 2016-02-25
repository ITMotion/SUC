<?php
	$clave = $_GET['clave'];
	include_once("../../model/DAOmaterias.php");
	$db = new DAOmaterias();
	$db->deleteMateria($clave);
?>
<div class="alert alert-success col-md-10">
	<button class="close" data-dismiss="alert"><span>&times;</span></button>
	Se eliminó correctamente la materia.
</div>

<?php
	$matricula = $_GET['matricula'];
	include_once("../../model/DAOalum.php");
	$db = new DAOalum();
	$db->deleteAlumno($matricula);
?>
<div class="alert alert-success col-md-10">
	<button class="close" data-dismiss="alert"><span>&times;</span></button>
	Se eliminó correctamente el alumno.
</div>

<?php
	$id = $_GET['clave'];
	include_once("../../model/DAOgm.php");
	$db = new DAOgm();
	$db->deleteGM($id);
?>
<div class="alert alert-warning col-md-10">
	<button class="close" data-dismiss="alert"><span>&times;</span></button>
	Se eliminó correctamente la materia.
</div>

<?php 
	$FI = $_POST['FI'];
	$FF = $_POST['FF'];
	$unidad = $_POST['unidad'];

	require_once("DAOasistencia.php");
	$db = new DAOasistencia();

	$db->updateFechasUnidad($FI, $FF, $unidad);
?>
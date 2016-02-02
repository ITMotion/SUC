<?php  
	$carrera = $_GET['codigo'];
	include_once("../model/DAOcarrera.php");
	$db = new DAOcarrera();
	$db->delCarrera($carrera);
	header("Location: Carreras.php?delSuccess");
?>
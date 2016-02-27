<?php
	include_once("DAOcarrera.php");
	$db = new DAOcarrera();
	$descripcion = $_POST["descripcion"];
	$codigo = $_POST["codigo"];
	$db->upCarrera($codigo, $descripcion);
	header("Location: ../views/Administrator/Carreras.php?updsuccess");
?>

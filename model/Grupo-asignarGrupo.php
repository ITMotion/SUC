<?php  
	$grupos = $_POST['grupos'];
	$salon = $_POST['salon'];
	$horario = $_POST['horario'];
	$carrera = $_POST['carrera'];
	
	include_once("DAOgrupo.php");
	$db = new DAOgrupo();
	$db->insertGrupo($grupos, $salon, $horario, $carrera);
	header("Location: ../views/Grupos.php?success");
?>
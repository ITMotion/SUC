<?php  
	require_once('../DAOgrupo.php');
	$db = new DAOgrupo();

	$grupo = $_POST['grpClave'];
	$salon = $_POST['grpSalon'];
	$horario = $_POST['grpHorario'];
	$carrera = $_POST['carrera'];

	$db->insertGrupo($grupo, $salon, $horario, $carrera);
?>
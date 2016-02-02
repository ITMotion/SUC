<?php  
	$grupo = $_GET['grupo'];
	include_once("../model/DAOgrupo.php");
	$db = new DAOgrupo();
	$db->deleteGrupo($grupo);
	header("Location: Grupos.php?deleteSuccess")
?>
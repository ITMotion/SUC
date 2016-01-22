<?php  
	$id = $_GET['clave'];
	include_once("../model/DAOgm.php");
	$db = new DAOgm();
	$list = $db->getDays($id);
	
	echo $list[0]->dia;
	
?>



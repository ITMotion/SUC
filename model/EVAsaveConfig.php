<?php 
	$ser = $_POST['serC'];
	$hacer = $_POST['hacerC'];
	$saber = $_POST['saberC'];
	$asignatura = $_POST['asignatura'];
	require_once("DAOeva.php");
	$dao = new DAOeva();
	$dao->updateConfig($asignatura, $ser, $hacer, $saber);
?>
	<th></th>
	<th>Porcentajes:</th>
	<th id="confSaber"><?php echo $saber; ?></th>
	<th id="confHacer"><?php echo $hacer; ?></th>
	<th id="confSer"><?php echo $ser; ?></th>
	<th></th>
	<th></th>
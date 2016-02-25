<?php
	$user = $_POST["user"];
	$pass = $_POST["password"];

	require_once("DAOlogin.php");
	$db = new DAOlogin();
	$db->establecerValores($user, $pass);
	$sesion = $db->comprobarCredenciales();
	if(!is_null($sesion)) {
		session_start();
		$_SESSION['user'] = $user;
		if ($sesion[0]->tipo == 1) {
			$_SESSION['permisos']=1;
			header("Location: ../views/Administrator/index.php");
		}
		elseif ($sesion[0]->tipo == 2) {
			$_SESSION['permisos']=2;
			header("Location: ../views/Profesor/index.php");
		}
	}
	else {
		header("Location: ../index.php?errorCredenciales");
	}
?>

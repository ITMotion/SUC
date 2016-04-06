<?php  
	$email = $_POST['email'];
	$password = $_POST['password'];
	$oldPassword = $_POST['oldPassword'];
	session_start();
	require_once("../DAOlogin.php");
	$db = new DAOlogin();
	
	if (empty($email)) {
		//Caso 1: si el usuario no editó el correo, entonces actualiza solo la contraseña
		if ($db->compruebaContraseña($oldPassword)) {
			header("Location: ../../views/Alumno/MisDatos.php?success");
		} else {
			header("Location: ../../views/Alumno/MisDatos.php?wrongPassword");
		}
	} else {
		
		if (empty($password)) {
			//Caso 2: Si el usuario editó el correo, pero no la contraseña, entonces actualiza solo el correo
		} 
		
		else {
			// Caso 3: Si el usuario editó tanto el correo como la contraseña, entonces se actualizan ambos.
		}
	}
?>
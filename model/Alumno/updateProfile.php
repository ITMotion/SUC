<?php
	/*
	* @author: Gustavo Valderrama
	* @email: gustavoavalderrama@gmail.com
	* @description: Recibe por método POST el correo o contraseñas del usuario para actualizarlas
	*/ 
	$email = $_POST['email'];
	$password = $_POST['password'];
	$oldPassword = $_POST['oldPassword'];
	session_start();
	require_once("../DAOlogin.php");
	$db = new DAOlogin();
	
	//Regresa un status en formato JSON
	// 1 = success
	// 2 = error
	// 3 = wrongPassword
	// 4 = successPassword
	// 5 = successEmail

	if (empty($email)) {
		//Caso 1: si el usuario no editó el correo, entonces actualiza solo la contraseña
		if ($db->compruebaContraseña($oldPassword)) {
			if ($db->actualizaContraseña($_SESSION['user'], $password)) {
				$jsondata["status"] = 1;
			} else {
				$jsondata["status"] = 2;
			}
		} else {
			$jsondata["status"] = 3;
		}
	} else {
		if (empty($password)) {
			//Caso 2: Si el usuario editó el correo, pero no la contraseña, entonces actualiza solo el correo
			if ($db->actualizaCorreoAlumno($_SESSION['user'], $email)) {
				$jsondata["status"] = 1;
			} else {
				$jsondata["status"] = 2;
			}
		} 
		else {
			// Caso 3: Si el usuario editó tanto el correo como la contraseña, entonces se actualizan ambos.
			if ($db->compruebaContraseña($oldPassword)) {
				$prueba1 = $db->actualizaContraseña($_SESSION['user'], $password);
				$prueba2 = $db->actualizaCorreoAlumno($_SESSION['user'], $email);
				if ($prueba1 && $prueba2) {
					$jsondata["status"] = 1;
				} elseif ($prueba1) {
					$jsondata["status"] = 4;
				} elseif ($prueba2) {
					$jsondata["status"] = 5;
				}
				else {
					$jsondata["status"] = 2;
				}
			} else {
				$jsondata["status"] = 3;
			}
		}
	}
	echo json_encode($jsondata, JSON_FORCE_OBJECT);
?>
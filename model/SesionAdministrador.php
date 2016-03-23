<?php //control de sesiones
	session_start();
	if($_SESSION['permisos'] != 1) {
		if($_SESSION['permisos'] == 2) { //si el usuario es profesor
			header('Location: ../Profesor/index.php?unauthorized');
		}
	}
?>

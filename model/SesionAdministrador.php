<?php //control de sesiones
	session_start();
	if($_SESSION['permisos'] != 1) {
		if($_SESSION['permisos'] == 2) { //si el usuario es profesor
			header('Location: ../../views/Profesor/index.php?unauthorized');
		}
		if($_SESSION['permisos'] == 3) { //si el usuario es alumno
			header("Location: ../../views/Alumno/index.php?unauthorized");
		}
	}
?>

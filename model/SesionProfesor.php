<?php
  session_start();
  if($_SESSION['permisos'] != 2) {
    if ($_SESSION['permisos'] == 1) {
      header("Location: ../views/Administrator/index.php?unauthorized");
    }
    if($_SESSION['permisos' == 3]) { //si el usuario es alumno
		header("Location: ../views/Alumno/index.php?unauthorized");
	}
  }
?>

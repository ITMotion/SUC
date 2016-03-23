<?php

	require_once("../DAOgm.php");
	$db = new DAOgm();

	$asignatura = $_POST['asignatura'];
	$grupo = $_POST['grupo'];
	$materia = $_POST['materia'];
	$NumUnidadesV = $_POST['NumUnidadesV'];
	$NumUnidadesN = $_POST['NumUnidadesN'];
	
	$db->deleteDays($asignatura);

	if (isset($_POST['dias'])) {
		$dias = $_POST['dias'];	
		$db->setDays($asignatura, $dias);
	}

	$db->updateAsignatura($asignatura, $materia, $grupo);
	
	/*sección para actualizar las unidades, si el usuario especifica que serán más unidades entonces se agregan
	unidades a la base de datos, de lo contrario, se eliminarán las últimas unidades hasta que el valor sea el deseado */
	if ($NumUnidadesN > $NumUnidadesV) {
		$db->updateUnidades($asignatura, $NumUnidadesN, $NumUnidadesV);
	} elseif ($NumUnidadesN < $NumUnidadesV) {
		while ($NumUnidadesV > $NumUnidadesN) {
			$db->deleteUnidad($asignatura, $NumUnidadesV);
			$NumUnidadesV--;
			
		}
	}
	header("Location: ../../views/Profesor/Asignaturas.php");
?>
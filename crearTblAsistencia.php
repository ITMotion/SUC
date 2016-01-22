<?php  
	$grupo = $_GET['idGrupo'];
	$fecha = $_GET['fecha'];
	include_once("class/class.admin.php");
	$db = new Admin();
	$students = $db->getStudents($grupo);
	$calendar = $db->getCalendar($grupo, $fecha);
	foreach ($students as $student) {
		$sql = "INSERT INTO asistencia VALUES ";
		$i = 0;
		foreach ($calendar as $row) {
			if($i==sizeof($calendar)-1) {
				$sql = $sql."(null, '". $student->matricula . "', '".$row->idmateria."', '".$grupo."', '".$row->fecha."',0); ";
			}
			else {
				$sql = $sql."(null, '". $student->matricula . "', '".$row->idmateria."', '".$grupo."', '".$row->fecha."',0), ";
			}
			$i++;
		}
		$db->setList($sql);
	}
	echo "Estudiantes:".sizeof($students);
	echo "Calendario: ".sizeof($calendar);
	echo "Filas: ".sizeof($students)*sizeof($calendar);
?>
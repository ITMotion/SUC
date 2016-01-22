<?php 
	require_once("config.ini.php");
	require_once("class.bd.php");

	class School {
		function School() {
			$this->activa_conexion();
		}

		function activa_conexion(){
			$this->bd = new DB;
			$this->bd->openCon(); 
		}
		
		function getGroup($idGrupo) {
			$sql = "SELECT * FROM grupos WHERE clave = '".$idGrupo."';";
			$this->bd->selectSQL($sql);
			return $this->bd->rowresult;
		}

		function getStudents($idGrupo) {
			$sql = "SELECT DISTINCT c.matricula, c.paterno, c.materno, c.nombres
				FROM `grupo-materia` AS a  INNER JOIN alumnos AS c ON a.idgrupo = c.grupo 
				WHERE a.idgrupo = '".$idGrupo."' ORDER BY c.matricula ASC;";
			$this->bd->selectSQL($sql);
			return $this->bd->rowresult;
		}

		function getTeacher($idGrupo, $idMateria) {
			$sql = 
			"SELECT b.paterno, b.materno, b.nombres
			FROM `grupo-materia` A INNER JOIN profesores B ON A.idprofesor = B.matricula 
			WHERE idgrupo = '".$idGrupo."' AND idmateria = ".$idMateria.";";
			$this->bd->selectSQL($sql);
			return $this->bd->rowresult;
		}


		function getList($idGrupo, $idMateria, $fecha) {
			$sql = "SELECT asistencia, fecha FROM asistencia WHERE grupo = '".$idGrupo."' AND materia = '".$idMateria."' AND fecha LIKE '".$fecha."%';";
			$this->bd->selectSQL($sql);
			if(!empty($this->bd->rowresult)){
				return $this->bd->rowresult;
			}
			else {
				return null;
			}
		}

		function getCalendar($idGrupo, $idMateria, $fecha) {
			$sql = "SELECT DISTINCT(fecha) FROM asistencia WHERE grupo = '".$idGrupo."' AND materia = '".$idMateria."' AND fecha LIKE '".$fecha."%' ORDER BY fecha;";
			$this->bd->selectSQL($sql);
			if(!empty($this->bd->rowresult)){
				return $this->bd->rowresult;
			}
			else {
				return null;
			}
		}

		function setList($fecha, $matricula, $asistencia, $materia) {
			$sql = "UPDATE asistencia SET asistencia = ".$asistencia." WHERE fecha = '".$fecha."' AND alumno = '".$matricula."' AND materia = '".$materia."';";
			return $this->bd->executeSQL($sql);
		}
}
?>
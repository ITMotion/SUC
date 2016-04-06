<?php  
	require_once("config.ini.php");
	require_once("class.bd.php");

	/**
	* @author Gustavo Valderrama
	* @description: 
	*/
	class DAOCalificaciones {
		
		function __construct() {
			$this->bd = new DB;
			$this->bd->openCon(); 
		}

		function obtenerAsignaturas($alumno) {
			$sql = "SELECT GM.id, M.descripcion AS materia, CONCAT(P.nombres, ' ', P.paterno, ' ', P.materno) AS profesor 
			FROM grupomateria GM 
			INNER JOIN materias M ON GM.idmateria = M.clave
			INNER JOIN alumnos A ON A.grupo = GM.idgrupo
			INNER JOIN profesores P ON GM.idprofesor = P.matricula
			WHERE A.matricula = ".$alumno.";";
			$this->bd->selectSQL($sql);
			return $this->bd->rowresult;
		}

		function obtenerCalificaciones($alumno, $asignatura) {
			$sql = "SELECT U.descripcion AS unidad, C.saber, C.hacer, C.ser, C.final, C.accionMejora FROM calificaciones C INNER JOIN grupomateria GM ON C.materia = GM.idmateria INNER JOIN unidades U ON C.unidad = U.id WHERE C.alumno = ".$alumno." AND GM.id = ".$asignatura." ORDER BY C.unidad;";
			$this->bd->selectSQL($sql);
			if (isset($this->bd->rowresult)) {
				return $this->bd->rowresult;		
			} else {
				return null;
			}
		}

		/* Obtiene todos los registros de asistencia, sin importar si es positiva o negativa*/
		function getAsistenciaTotal($matricula, $unidad, $asignatura) 
		{
			$sql = "SELECT COUNT(A.asistencia) AS TOTAL
			FROM asistencia A INNER JOIN unidades U ON A.materia = U.materia 
			WHERE A.alumno = ".$matricula." AND A.materia = ".$asignatura." AND A.fecha BETWEEN U.fechainicio AND U.fechafin;";
			$this->bd->selectSQL($sql);
			if(!empty($this->bd->rowresult))
			{
				return $this->bd->rowresult;
			}
			else 
			{
				return null;
			}
		}

		/*Obtiene las asistencias positivas del alumno */
		function getAsistencia($matricula, $unidad, $asignatura)
		{
			$sql = "SELECT COUNT(A.asistencia) AS parcial
			FROM asistencia A INNER JOIN unidades U ON A.materia = U.materia 
			WHERE A.asistencia = 1 AND A.alumno = ".$matricula." AND A.materia = ".$asignatura." AND A.fecha BETWEEN U.fechainicio AND U.fechafin;";
			$this->bd->selectSQL($sql);
			if(!empty($this->bd->rowresult))
			{
				return $this->bd->rowresult;
			}
			else 
			{
				return null;
			}
		}

	}
?>
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
	}
?>
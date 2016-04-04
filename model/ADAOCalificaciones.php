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
			$sql = "SELECT M.descripcion AS materia FROM grupomateria GM 
			INNER JOIN materias M ON GM.idmateria = M.clave
			INNER JOIN alumnos A ON A.grupo = GM.idgrupo
			WHERE A.matricula = ".$alumno.";";
			$this->bd->selectSQL($sql);
			return $this->bd->rowresult;
		}
	}
?>
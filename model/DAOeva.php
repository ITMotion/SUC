<?php 
	require_once("config.ini.php");
	require_once("class.bd.php");

	/**
	* 
	*/
	class DAOeva
	{
		
		function __construct()
		{
			$this->bd = new DB;
			$this->bd->openCon();
		}

		function getAlumnosPorGrupo($grupo)
		{
			$sql = "SELECT * FROM alumnos WHERE grupo = '".$grupo."';";
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

		function getAsistenciaTotal($matricula, $unidad, $materia) 
		{
			$sql = "SELECT COUNT(A.asistencia) AS TOTAL
			FROM asistencia A INNER JOIN unidades U ON A.materia = U.materia 
			WHERE A.alumno = ".$matricula." AND A.materia = ".$materia." AND A.fecha BETWEEN U.fechainicio AND U.fechafin;";
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

		function getAsistencia($matricula, $unidad, $materia)
		{
			$sql = "SELECT COUNT(A.asistencia) AS parcial
			FROM asistencia A INNER JOIN unidades U ON A.materia = U.materia 
			WHERE A.asistencia = 1 AND A.alumno = ".$matricula." AND A.materia = ".$materia." AND A.fecha BETWEEN U.fechainicio AND U.fechafin;";
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
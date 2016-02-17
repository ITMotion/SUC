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

		function getPorcentajeCalif($asignatura) {
			$sql = "SELECT CC.saber, CC.saberHacer, CC.ser
			FROM grupomateria GM INNER JOIN configcalificaciones CC ON GM.id = CC.asignatura WHERE GM.id = ".$asignatura.";";
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

		function updateConfig($asignatura, $ser, $hacer, $saber) {
			$sql = "UPDATE configcalificaciones SET saber = ".$saber." 
			, saberHacer = ".$hacer." , ser = ".$ser." WHERE asignatura = ".$asignatura.";";
			return $this->bd->executeSQL($sql);
		}

		function insertCalif($alumno, $materia, $unidad, $saber, $hacer, $ser, $total, $am){
			$sql = "INSERT INTO calificaciones VALUES (null, ".$alumno.", ".$materia.", 
				".$unidad.", ".$saber.", ".$hacer.", ".$ser.", ".$total.", ".$am.");";
			return $this->bd->executeSQL($sql);
		}

		function updateCalif($alumno, $materia, $unidad, $saber, $hacer, $ser, $total, $am){
			$sql = "UPDATE calificaciones SET saber = ".$saber.", hacer = ".$hacer.", ser = ".$ser.", final = ".$total.", accionMejora = ".$am." WHERE alumno = ".$alumno." AND materia = ".$materia." AND unidad = ".$unidad.";";
			return $this->bd->executeSQL($sql);
		}

		function getCalificacionAlumno($matricula, $materia, $unidad) {
			$sql = "SELECT * FROM calificaciones WHERE alumno = ".$matricula." AND materia = ".$materia." AND unidad = ".$unidad.";";
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
<?php 
	require_once("config.ini.php");
	require_once("class.bd.php");

	/**
	* 
	*/
	class DAOasistencia {
		
		function DAOasistencia() {
			$this->activa_conexion();
		}

		function activa_conexion() {
			$this->bd = new DB;
			$this->bd->openCon(); 
		}

		//obtiene una lista de carreras en general 
		function getCarreras() {
			$sql = "SELECT * FROM carreras;";
			$this->bd->selectSQL($sql);
			return $this->bd->rowresult;
		}

		function getGruposByCarrera($carrera) {
			$sql = "SELECT * FROM grupos WHERE carrera = ".$carrera.";";
			$this->bd->selectSQL($sql);
			if(!empty($this->bd->rowresult)){
				return $this->bd->rowresult;
			}
			else {
				return null;
			}
		}

		function getMateriasByGrupo($grupo) {
			$sql = "SELECT MAT.clave, MAT.descripcion FROM grupomateria GM INNER JOIN materias MAT ON GM.idmateria = MAT.clave WHERE idgrupo = '".$grupo."';";
			$this->bd->selectSQL($sql);
			if(!empty($this->bd->rowresult)){
				return $this->bd->rowresult;
			}
			else {
				return null;
			}
		}

		function getUnidadesByMateria($materia) {
			$sql = "SELECT * FROM unidades WHERE materia = '".$materia."';";
			$this->bd->selectSQL($sql);
			if(!empty($this->bd->rowresult)){
				return $this->bd->rowresult;
			}
			else {
				return null;
			}
		}

		function getProfesorByGrupoAndMateria($grupo, $materia) {
			$sql = "SELECT PROF.nombres, PROF.paterno, PROF.materno 
				FROM grupomateria GM INNER JOIN profesores PROF
				ON GM.idprofesor = PROF.matricula 
				WHERE GM.idmateria = ".$materia." AND GM.idgrupo = '".$grupo."';";
				$this->bd->selectSQL($sql);
				if(!empty($this->bd->rowresult)){
					return $this->bd->rowresult;
				}
				else {
					return null;
				}	
		}

		function getAsignaturaByGrupoAndMateriaAndUnidad($grupo, $materia, $unidad) {
			$sql = "SELECT CAL.fecha FROM grupomateria GM
    			INNER JOIN diasmaterias DM ON GM.id = DM.materia
    			INNER JOIN calendario CAL ON DM.dia = CAL.`dia-semana`
    			INNER JOIN unidades U ON GM.idmateria = U.materia
				WHERE GM.idgrupo = '".$grupo."' AND idmateria = ".$materia." AND U.descripcion = ".$unidad." 
					AND CAL.fecha BETWEEN U.fechainicio AND U.fechafin;";
			$this->bd->selectSQL($sql);
			if(!empty($this->bd->rowresult)){
				return $this->bd->rowresult;
			}
			else {
				return null;
			}	
		}

		function getAlumnosByGrupo($grupo) {
			$sql = "SELECT * FROM alumnos WHERE grupo = '".$grupo."';";
			$this->bd->selectSQL($sql);
			if(!empty($this->bd->rowresult)){
				return $this->bd->rowresult;
			}
			else {
				return null;
			}	
		}

		function getAsignaturasByProfesor($profesor) {
			$sql = "SELECT M.descripcion AS matDescripcion, GM.idmateria, GM.id AS idasignatura, GM.idgrupo AS grupo 
			FROM grupomateria GM INNER JOIN materias M on GM.idmateria = M.clave WHERE idprofesor = $profesor;";
			$this->bd->selectSQL($sql);
			return $this->bd->rowresult;
		}

		/*function obtenerAsistenciaPorGrupoYMateriaYUnidad($grupo, $materia, $unidad, $alumno) {
			$sql = "SELECT ASIST.fecha
				FROM grupomateria GM INNER JOIN diasmaterias DM
				ON GM.id = DM.materia
				INNER JOIN calendario CAL ON DM.dia = CAL.`dia-semana`
    			INNER JOIN unidades U ON GM.idmateria = U.materia
    			INNER JOIN asistencia ASIST ON CAL.fecha = ASIST.fecha
    			WHERE GM.idgrupo = '".$grupo."' 
    			AND idmateria = '".$materia."' 
    			AND U.descripcion = ".$unidad."
    			AND ASIST.alumno = ".$alumno."
    			AND CAL.fecha BETWEEN U.fechainicio AND U.fechafin ORDER BY ASIST.fecha ASC;";
			$this->bd->selectSQL($sql);
			if(!empty($this->bd->rowresult)){
				return $this->bd->rowresult;
			}
			else {
				return null;
			}
		}*/

		function getAsistencia($alumno, $materia, $fecha) {
			$sql = "SELECT asistencia FROM asistencia WHERE alumno = ".$alumno." AND materia = '".$materia."' AND fecha = '".$fecha."';";
			$this->bd->selectSQL($sql);
			if(empty($this->bd->rowresult)){
				$this->createAsistencia($alumno, $materia, $fecha);
				return 0;
			}
			else {
				return $this->bd->rowresult;
			}
		}

		function createAsistencia($alumno, $materia, $fecha) {
			$sql = "INSERT INTO asistencia VALUES (null, ".$alumno.", '".$materia."', '".$fecha."', 0);";
			return $this->bd->executeSQL($sql);
		}

		function updateAsistencia($fecha, $matricula, $asistencia, $materia) {
			$sql = "UPDATE asistencia SET asistencia = ".$asistencia." WHERE alumno = ".$matricula." AND materia = '".$materia."' AND fecha = '".$fecha."';";
			return $this->bd->executeSQL($sql);
		}
	}
?>
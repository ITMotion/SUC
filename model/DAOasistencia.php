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

		function getProfesorByAsignatura($asignatura) {
			
		}

		function getAsignaturaByGrupoAndMateria($grupo, $materia) {
			$sql = "SELECT CAL.fecha FROM grupomateria GM
    			INNER JOIN diasmaterias DM ON GM.id = DM.materia
    			INNER JOIN calendario CAL ON DM.dia = CAL.`dia-semana`
    			INNER JOIN unidades U ON GM.idmateria = U.materia
				WHERE GM.idgrupo = '".$grupo."' AND idmateria = '".$materia."' AND CAL.fecha BETWEEN U.fechainicio AND U.fechafin;;";
			$this->bd->selectSQL($sql);
			if(!empty($this->bd->rowresult)){
				return $this->bd->rowresult;
			}
			else {
				return null;
			}	
		}
	}
?>
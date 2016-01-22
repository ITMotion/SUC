<?php
	require_once("config.ini.php");
	require_once("class.bd.php");

	class DAOgm {
		function DAOgm() {
			$this->activa_conexion();
		}

		function activa_conexion(){
			$this->bd = new DB;
			$this->bd->openCon(); 
		}

		//Obtiene la tabla grupo-materia
		function getGmInfo() {
			$sql = "SELECT GM.id, GR.grupo, MT.descripcion, PR.paterno, PR.materno, PR.nombres
				FROM grupomateria GM 
				INNER JOIN grupos GR 
					ON GM.idgrupo = GR.grupo 
				INNER JOIN materias MT 
					ON GM.idmateria = MT.clave 
				INNER JOIN profesores PR 
					ON GM.idprofesor = PR.matricula
					ORDER BY GM.idgrupo asc;";
			$this->bd->selectSQL($sql);
			if(!empty($this->bd->rowresult)){
				return $this->bd->rowresult;
			}
			else {
				return null;
			}
		}

		function getGmDetailedInfo($id) {
			$sql = "SELECT GM.id, GR.grupo, MT.descripcion, PR.paterno, PR.materno, PR.nombres
				FROM grupomateria GM 
				INNER JOIN grupos GR 
					ON GM.idgrupo = GR.grupo 
				INNER JOIN materias MT 
					ON GM.idmateria = MT.clave 
				INNER JOIN profesores PR 
					ON GM.idprofesor = PR.matricula
					WHERE GM.id = ".$id.";";
			$this->bd->selectSQL($sql);
			if(!empty($this->bd->rowresult)){
				return $this->bd->rowresult;
			}
			else {
				return null;
			}
		}

		//obtiene un listado de carreras
		function getCarreras() {
			$sql = "SELECT * FROM carreras;";
			$this->bd->selectSQL($sql);
			if(!empty($this->bd->rowresult)){
				return $this->bd->rowresult;
			}
			else {
				return null;
			}
		}

		function getGruposPorCarrera($carrera) {
			$sql = "SELECT * FROM grupos WHERE carrera = ".$carrera;
			$this->bd->selectSQL($sql);
			if(!empty($this->bd->rowresult)){
				return $this->bd->rowresult;
			}
			else {
				return null;
			}
		}

		function getMateriasPorCarrera($carrera) {
			$sql = "SELECT * FROM materias WHERE carrera = ".$carrera;
			$this->bd->selectSQL($sql);
			if(!empty($this->bd->rowresult)){
				return $this->bd->rowresult;
			}
			else {
				return null;
			}
		}

		function getProfesoresPorCarrera($carrera) {
			$sql = "SELECT * FROM profesores WHERE carrera = ".$carrera;
			$this->bd->selectSQL($sql);
			if(!empty($this->bd->rowresult)){
				return $this->bd->rowresult;
			}
			else {
				return null;
			}
		}

		//Comprueba que el grupo no tenga asignada la materia en la base de datos
		function compruebaFila($grupo, $materia, $profesor) {
			$sql = "SELECT * FROM grupomateria WHERE idgrupo = '".$grupo."' AND idmateria = '".$materia."' AND idprofesor = '".$profesor."';";
			$this->bd->selectSQL($sql);
			if(!empty($this->bd->rowresult)){
				return $this->bd->rowresult;
			}
			else {
				return null;
			}
		}

		//inserta una nueva fila en la tabla de grupomateria
		function setRow($grupo, $materia, $profesor) {
			$sql = "INSERT INTO grupomateria VALUES (null, '".$grupo."', '".$materia."', '".$profesor."');";
			return $this->bd->executeSQL($sql);
		}

		//OBTIENE la última fila insertada en la tabla grupomateria
		function getLastRowInserted() {
			$sql = "SELECT MAX(id) AS id FROM grupomateria;";
			$this->bd->selectSQL($sql);
			if(!empty($this->bd->rowresult)){
				return $this->bd->rowresult;
			}
			else {
				return null;
			}
		}

		//establece los días que aplican a la materia
		function setDays($materia, $dias) {
			for ($i=0; $i < count($dias); $i++) { 
				$sql = "INSERT INTO diasmaterias VALUES (null, ".$materia.", '".$dias[$i]."');";
				$this->bd->executeSQL($sql);
			}
		}

		function getDays($materia) {
			$sql = "SELECT * FROM diasmaterias WHERE materia = ".$materia.";";
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
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

		function getAsignaturaEdit($id) {
			$sql = "SELECT GM.idmateria AS materia, GM.idgrupo AS grupo, M.carrera
			FROM grupomateria GM 
			INNER JOIN materias M ON GM.idmateria = M.clave
			WHERE GM.id = ".$id.";";
			$this->bd->selectSQL($sql);
			if(!empty($this->bd->rowresult)){
				return $this->bd->rowresult;
			}
			else {
				return null;
			}
		}

		function getGmDetailedInfo($id) {
			$sql = "SELECT GM.id, GR.grupo, MT.descripcion, MT.clave, MT.carrera, PR.paterno, PR.materno, PR.nombres
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

		function getProfesores() {
			$sql = "SELECT * FROM profesores; ";
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
			return $this->bd->insertAutoIncrement($sql);
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


		function setDays($asignatura, $dias) {
			$sql = "INSERT INTO diasmaterias (materia, dia) VALUES ";
			for($i=0; $i<sizeof($dias); $i++) {
				$sql = $sql . "(".$asignatura.",'".$dias[$i]."')";
				
				if ($i == (sizeof($dias) - 1)) {
					$sql =  $sql . ";";
				} else {
					$sql =  $sql . ",";
				}
			}
			return $this->bd->executeSQL($sql);
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

		function compruebaDia($asignatura, $dia) {
			$sql = "SELECT * FROM diasmaterias WHERE dia = '".$dia."' AND materia = ". $asignatura.";";
			$this->bd->selectSQL($sql);
			if(!empty($this->bd->rowresult)){
				return true;
			}
			else 
			{
				return false;
			}
		}

		function getAsignatura($id) {
			$sql = "SELECT * FROM grupomateria GM INNER JOIN diasmaterias DM ON GM.id = DM.id WHERE GM.id = ".$id.";";
			$this->bd->selectSQL($sql);
			if(!empty($this->bd->rowresult)){
				return $this->bd->rowresult;
			}
			else {
				return null;
			}
		}

		function updateGM($id, $profesor) {
			$sql = "UPDATE grupomateria SET idprofesor = '".$profesor."' WHERE id = ".$id.";";
			$this->bd->executeSQL($sql);
		}

		function updateAsignatura($asignatura, $materia, $grupo) {
			$sql = "UPDATE grupomateria SET idgrupo = '".$grupo."', idmateria = ".$materia." WHERE id = ".$asignatura.";";
			return $this->bd->executeSQL($sql);
		}

		//elimina de la tabla diasmaterias los dias correspondientes a la materia
		function deleteDays($id) {
			$sql = "DELETE FROM diasmaterias WHERE materia = ".$id.";";
			$this->bd->executeSQL($sql);
		}

		//elimina un registro de la tabla grupomateria
		function deleteGM($id) {
			$sql = "DELETE FROM grupomateria WHERE id = ".$id.";";
			return $this->bd->executeSQL($sql);
		}

		function getAsignaturaProfesor($matricula) {
			$sql = "SELECT GM.id, GM.idgrupo, M.descripcion AS materia FROM grupomateria GM INNER JOIN materias M ON GM.idmateria = M.clave WHERE idprofesor = ".$matricula;
			$this->bd->selectSQL($sql);
			if(!empty($this->bd->rowresult)){
				return $this->bd->rowresult;
			}
			else {
				return null;
			}
		}

		function setUnidades($asignatura, $numUnidades) {
			$sql = "INSERT INTO unidades (materia, descripcion) VALUES ";
			for ($i=0; $i < $numUnidades; $i++) { 
				$sql = $sql . "(".$asignatura.",".($i+1).")";
				if ($i == ($numUnidades - 1)) {
					$sql =  $sql . ";";
				} else {
					$sql =  $sql . ",";
				}
			}
			$this->bd->executeSQL($sql);
		}

		function updateUnidades($asignatura, $NumUnidadesN, $NumUnidadesV) {
			$sql = "INSERT INTO unidades (materia, descripcion) VALUES ";
			for ($NumUnidadesV; $NumUnidadesV != $NumUnidadesN; $NumUnidadesV++) { 
				$sql = $sql . "(".$asignatura.",".($NumUnidadesV+1).")";
				if ($NumUnidadesV == ($NumUnidadesN - 1)) {
					$sql =  $sql . ";";
				} else {
					$sql =  $sql . ",";
				}
			}
			return $this->bd->executeSQL($sql);
		}

		function countUnidades($asignatura) {
			$sql = "SELECT COUNT(id) AS numero FROM unidades WHERE materia = ".$asignatura.";";
			$this->bd->selectSQL($sql);
			if(!empty($this->bd->rowresult)){
				return $this->bd->rowresult;
			}
			else {
				return null;
			}
		}

		function deleteUnidad($asignatura, $unidad) {
			$sql = "DELETE FROM unidades WHERE descripcion = ".$unidad." AND materia = ".$asignatura.";";
			return $this->bd->executeSQL($sql);
		}
	}
?>

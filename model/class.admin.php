<?php 
	require_once("config.ini.php");
	require_once("class.bd.php");

	class Admin {
		
		function Admin() {
			$this->activa_conexion();
		}

		function activa_conexion(){
			$this->bd = new DB;
			$this->bd->openCon(); 
		}

		//obtiene la fecha y la materia en base al grupo y al rango de tiempo
		function getCalendar($idGrupo, $año) {
			$sql = "SELECT DISTINCT B.fecha, A.idmateria
				FROM `grupo-materia` A INNER JOIN calendario B ON a.dia1 = b. `dia-semana` OR a.dia2 = b.`dia-semana` OR a.dia3 = b.`dia-semana` OR a.dia4 = b.`dia-semana`
				WHERE A.idgrupo = '".$idGrupo."' AND B.Fecha LIKE '".$año."%' ORDER BY B.fecha ASC;";
			$this->bd->selectSQL($sql);
			if(!empty($this->bd->rowresult)){
				return $this->bd->rowresult;
			}
			else {
				return null;
			}
		}

		//función para ejecutar un sql
		function setList($sql) {
			return $this->bd->executeSQL($sql);
		}

		//Obtiene la matrícula de los estudiantes
		function getStudents($grupo) {
			$sql = "SELECT matricula FROM alumnos WHERE grupo = '".$grupo."';";
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
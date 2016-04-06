<?php  
	require_once("config.ini.php");
	require_once("class.bd.php");
	require_once('class.no_injections.php');

	class DAOlogin {
		function __construct(){
			$this->activa_conexion();
		}
		function activa_conexion(){
			$this->bd = new DB;
			$this->bd->openCon();
			$this->validador = new no_injections;
		}

		function establecerValores($a, $b) {
			$this->user = $this->validador->da_formato($a, "text", $this->bd->cnn);
			$this->password = $this->validador->da_formato($b ,"text", $this->bd->cnn);
		}

		function comprobarCredenciales() {
			$sql = "SELECT tipo FROM usuarios WHERE username = ".$this->user." AND contraseña = ".$this->password.";";
			$this->bd->selectSQL($sql);
			return $this->bd->rowresult;
		}

		function compruebaContraseña($contraseña) {
			$sql = "SELECT contraseña FROM usuarios WHERE contraseña = '".$contraseña."'";
			if (!is_null($this->bd->selectSQL($sql))) {
				return true;
			} else {
				return false;
			}
		}

		function getInfoAlumno($user) {
			$sql = "SELECT * FROM alumnos WHERE matricula = $user;";
			$this->bd->selectSQL($sql);
			return $this->bd->rowresult;
		}

		function getInfoProfesor($user) {
			$sql = "SELECT * FROM profesores  WHERE matricula = ".$user;
			$this->bd->selectSQL($sql);
			return $this->bd->rowresult;
		}
	}
?>
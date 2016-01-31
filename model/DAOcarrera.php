<?php 
	//Incluir ambos archivos
	include_once("config.ini.php"); 
	include_once("class.bd.php");
	
	/**
	* @author: Sergio Meza
	* @date: 29/01/2016
	* @email: wayne6@hotmail.com
	*/
	
	//Se crea una clase con las funciones
	class DAOcarrera
	{
		//Funcion para conectar
		function DAOcarrera()
		{
			$this->connect();
		}

		//Funcion para abrir conexión a base de datos que se encuentra en el archivo class.bd
		function connect()
		{
			$this->bd = new DB;
			$this->bd->openCon();
		}

		//Se hace la consulta y se obtienen los datos
		function getCarreras(){
			$sql="SELECT * FROM carreras;";
			$this->bd->selectSQL($sql);
			return $this->bd->rowresult;
		}

		function setCarrera($descripcion){
			$sql="INSERT INTO carreras VALUES (null,'".$descripcion."');";
			$this->bd->executeSQL($sql);
		}

		function upCarrera($codigo){
			$sql="UPDATE carreras SET descripcion = '".$descripcion."' WHERE codigo = ".$codigo.";";
			$this->bd->executeSQL($sql);
		}

		function delCarrera($codigo) {
			$sql = "DELETE FROM carreras WHERE codigo = ".$codigo.";";
			$this->bd->executeSQL($sql);
		}
	}
?>
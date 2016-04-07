<?php	 
	class DB{
		var $cnn; 	// conexion a la bd
		var $rs;	// recorset de la conexion
		var $numr;	// # de rows entregados
		var $error;	// mensaje de error generado
		var $rowresult;	// array asoc. p/ almacenar resultados
		var $indx;	// indice q' determina la posici? del recordset
		var $rss;	// almacena el registro actual en las sentencias d' desplazamiento 
		
		// metodo para realizar la conexion
		function openCon(){ 
			$this->cnn=mysqli_connect(host, usr, pass, db);			
			if(!$this->cnn){
				$this->error="Could not connect to mysql";
				return false;
			}
			mysqli_set_charset($this->cnn,'utf8');		 
			return true;		
		}
			
		//Desconectar la base de datos
		private function closeCon() {
			$this->cnn->close();
		}
	
		// m?odo para ejecutar una consulta
		function executeSQL($sql){
			$this->openCon(); 
			$this->rs=$this->cnn->query($sql); 
			if(!$this->rs){
				$this->error="Error en la consulta: ". mysqli_error();
				return false;
			}else{
				$this->closeCon();
				return true;
			}			
		}

		function insertAutoIncrement($sql) {
			$this->openCon();
			$this->rs=$this->cnn->query($sql); 
			if(!$this->rs){
				$this->error="Error en la consulta: ". mysql_error();
				return false;
			}else{
				$id = $this->cnn->insert_id;
				$this->closeCon();
				return $id;
			}	
		}
		
		function selectSQL($sql){
			$this->openCon(); 
			unset($this->rss);
			unset($this->rowresult);
			$this->rs = $this->cnn->query($sql); 
			if ( ! $this->rs ){
				$this->error="Error en la Consulta: ".mysql_error();
				return false;
			}else{
				$this->numr = mysqli_num_rows( $this->rs );
				while($row = mysqli_fetch_assoc($this->rs)) {
					$this->rowresult[] = (object)$row;
					}
				$this->indx = 0;
				$this->rss = (isset($this->rowresult[$this->indx])) ? $this->rowresult[$this->indx] : NULL;
				if (!empty($this->rowresult)) {
					return $this->rowresult;
				}
				else {
					return null;
				}
			}
		}
			
		//	método para cerrar la conexión
		function closeConex(){
			mysqli_close($this->cnn);
		}
		
	}
?>
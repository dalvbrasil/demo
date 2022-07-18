<?php 

	class conetar{
		private $servidor="localhost";
		private $usuario="root";
		private $password="";
		private $bd="demopro";

		public function conexion(){
			$conexion=mysqli_connect($this->servidor,
									 $this->usuario,
									 $this->password,
									 $this->bd);
			return $conexion;
		}
	}


 ?>
<?php 

	class conetar{
		private $servidor="localhost";
		private $usuario="sol_0";
		private $password="oct1969";
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
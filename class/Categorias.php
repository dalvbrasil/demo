<?php 
	class categorias{

		public function agregaCategoria($datos){
			$c= new conetar();
			
			$conexion=$c->conexion();

			$sql="INSERT into categorias(id_usuario,
										nomeCategoria,
										fechaCaptura)
						values ('$datos[0]',
								'$datos[1]',
								'$datos[2]')";

			return mysqli_query($conexion,$sql);
		}

		public function actualizaCategoria($datos){
			$c= new conetar();
			$conexion=$c->conexion();

			$sql="UPDATE categorias set nomeCategoria='$datos[1]'
								where id_categoria='$datos[0]'";
			echo mysqli_query($conexion,$sql);
		}

		public function eliminaCategoria($idcategoria){
			$c= new conetar();
			$conexion=$c->conexion();
			$sql="DELETE from categorias 
					where id_categoria='$idcategoria'";
			return mysqli_query($conexion,$sql);
		}

	}

 ?>
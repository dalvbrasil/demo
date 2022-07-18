

<?php 
	class produtos{
		public function agregaImagen($datos){
			$c=new conetar();
			$conexion=$c->conexion();

			$fecha=date('Y-m-d');

			$sql="INSERT into imagens (id_categoria,
										nome,
										ruta,
										fechaSubida)
							values ('$datos[0]',
									'$datos[1]',
									'$datos[2]',
									'$fecha')";
			$result=mysqli_query($conexion,$sql);

			return mysqli_insert_id($conexion);
		}
		public function insertaProduto($datos){
			$c=new conetar();
			$conexion=$c->conexion();

			$fecha=date('Y-m-d');

			$sql="INSERT into produtos (id_categoria,
										id_imagem,
										id_usuario,
										nome,
										descricao,
										quantidade,
										preco,
										fechaCaptura) 
							values ('$datos[0]',
									'$datos[1]',
									'$datos[2]',
									'$datos[3]',
									'$datos[4]',
									'$datos[5]',
									'$datos[6]',
									'$fecha')";
			return mysqli_query($conexion,$sql);
		}

		public function obtenDatosProduto($idarticulo){
			$c=new conetar();
			$conexion=$c->conexion();

			$sql="SELECT id_produto, 
						id_categoria, 
						nome,
						descricao,
						quantidade,
						preco 
				from articulos 
				where id_produto='$idarticulo'";
			$result=mysqli_query($conexion,$sql);

			$ver=mysqli_fetch_row($result);

			$datos=array(
					"id_produto" => $ver[0],
					"id_categoria" => $ver[1],
					"nome" => $ver[2],
					"descricao" => $ver[3],
					"quantidade" => $ver[4],
					"preco" => $ver[5]
						);

			return $datos;
		}

		public function actualizaArticulo($datos){
			$c=new conetar();
			$conexion=$c->conexion();

			$sql="UPDATE articulos set id_categoria='$datos[1]', 
										nome='$datos[2]',
										decricao='$datos[3]',
										quantidade='$datos[4]',
										preco='$datos[5]'
						where id_produto='$datos[0]'";

			return mysqli_query($conexion,$sql);
		}

		public function eliminaArticulo($idarticulo){
			$c=new conetar();
			$conexion=$c->conexion();

			$idimagem=self::obtenIdImg($idarticulo);

			$sql="DELETE from articulos 
					where id_produto='$idarticulo'";
			$result=mysqli_query($conexion,$sql);

			if($result){
				$ruta=self::obtenRutaImagen($idimagem);

				$sql="DELETE from imagens 
						where id_imagem='$idimagem'";
				$result=mysqli_query($conexion,$sql);
					if($result){
						if(unlink($ruta)){
							return 1;
						}
					}
			}
		}

		public function obtenIdImg($idProduto){
			$c= new conetar();
			$conexion=$c->conexion();

			$sql="SELECT id_imagem
					from articulos 
					where id_produto='$idProduto'";
			$result=mysqli_query($conexion,$sql);

			return mysqli_fetch_row($result)[0];
		}

		public function obtenRutaImagen($idImg){
			$c= new conetar();
			$conexion=$c->conexion();

			$sql="SELECT ruta 
					from imagens 
					where id_imagem='$idImg'";

			$result=mysqli_query($conexion,$sql);

			return mysqli_fetch_row($result)[0];
		}

	}

 ?>
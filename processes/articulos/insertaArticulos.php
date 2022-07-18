<?php 
	session_start();
	$iduser=$_SESSION['iduser'];
	require_once "../../conexao/Conexion.php";
	require_once "../../class/Articulos.php";

	$obj= new articulos();

	$datos=array();
	
	$nomeImg=$_FILES['imagem']['name'];
	$rutaAlmacenamiento=$_FILES['imagem']['tmp_name'];
	$carpeta='../../archivos/';
	$rutaFinal=$carpeta.$nomeImg;

	$datosImg=array(
		$_POST['categoriaSelect'],
		$nomeImg,
		$rutaFinal
					);

		if(move_uploaded_file($rutaAlmacenamiento, $rutaFinal)){
				$idimagem=$obj->agregaImagen($datosImg);

				if($idimagem > 0){

					$datos[0]=$_POST['categoriaSelect'];
					$datos[1]=$idimagem;
					$datos[2]=$iduser;
					$datos[3]=$_POST['nome'];
					$datos[4]=$_POST['descricao'];
					$datos[5]=$_POST['quantidade'];
					$datos[6]=$_POST['preco'];
					echo $obj->insertaArticulo($datos);
				}else{
					echo 0;
				}
		}

 ?>
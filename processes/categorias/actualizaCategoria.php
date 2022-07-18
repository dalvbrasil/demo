<?php 
	require_once "../../conexao/Conexion.php";
	require_once "../../class/Categorias.php";

	

	$datos=array(
		$_POST['idcategoria'],
		$_POST['categoriaU']
			);

	$obj= new categorias();

	echo $obj->actualizaCategoria($datos);

 ?>
<?php 
	require_once "../../conexao/Conexion.php";
	require_once "../../class/Categorias.php";
	$id=$_POST['idcategoria'];

	$obj= new categorias();
	echo $obj->eliminaCategoria($id);

 ?>
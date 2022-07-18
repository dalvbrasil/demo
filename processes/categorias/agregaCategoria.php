<?php 
	session_start();
	require_once "../../conexao/Conexion.php";
	require_once "../../class/Categorias.php";
	$fecha=date("Y-m-d");
	$idusuario=$_SESSION['iduser'];
	$nomeCategoria=$_POST['nomeCategoria'];

	$datos=array(
		$idusuario,
		$nomeCategoria,
		$fecha
				);

	$obj= new categorias();

	echo $obj->agregaCategoria($datos);


 ?>
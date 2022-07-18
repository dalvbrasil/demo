<?php 

	require_once "../../conexao/Conexion.php";
	require_once "../../class/Articulos.php";

	$obj= new articulos();


	$idart=$_POST['idart'];

	echo json_encode($obj->obtenDatosArticulo($idart));

 ?>
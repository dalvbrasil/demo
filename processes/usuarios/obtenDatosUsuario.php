<?php 

	require_once "../../conexao/Conexion.php";
	require_once "../../class/Usuarios.php";

	$obj= new usuarios;

	echo json_encode($obj->obtenDatosUsuario($_POST['idusuario']));

 ?>
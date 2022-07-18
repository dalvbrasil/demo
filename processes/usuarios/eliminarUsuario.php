<?php 

	require_once "../../conexao/Conexion.php";
	require_once "../../class/Usuarios.php";

	$obj= new usuarios;

	echo $obj->eliminaUsuario($_POST['idusuario']);

 ?>
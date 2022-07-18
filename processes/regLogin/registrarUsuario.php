<?php 

	require_once "../../conexao/Conexion.php";
	require_once "../../class/Usuarios.php";

	$obj= new usuarios();

	$pass=sha1($_POST['password']);
	$datos=array(
		$_POST['nome'],
		$_POST['sobrenome'],
		$_POST['usuario'],
		$pass
				);

	echo $obj->registroUsuario($datos);

 ?>
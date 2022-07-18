<?php 

	require_once "../../conexao/Conexion.php";
	require_once "../../class/Usuarios.php";

	$obj= new usuarios;

	$datos=array(
			$_POST['idUsuario'],  
		    $_POST['nomeU'] , 
		    $_POST['sobrenomeU'],  
		    $_POST['usuarioU']
				);  
	echo $obj->actualizaUsuario($datos);


 ?>
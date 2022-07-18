<?php 

require_once "../../conexao/Conexion.php";
require_once "../../class/Articulos.php";

$obj= new articulos();

$datos=array(
		$_POST['idArticulo'],
	    $_POST['categoriaSelectU'],
	    $_POST['nomeU'],
	    $_POST['descricaoU'],
	    $_POST['quantidadeU'],
	    $_POST['precoU']
			);

    echo $obj->actualizaArticulo($datos);

 ?>
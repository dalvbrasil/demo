<?php 


require_once "../../conexao/Conexion.php";
require_once "../../class/Articulos.php";
$idart=$_POST['idarticulo'];

	$obj=new articulos();

	echo $obj->eliminaArticulo($idart);

 ?>

<?php require_once "dependencias.php" ?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <!-- Begin Navbar --><div class="navbar">
  <div class="navbar-inner">
    <div class="container">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a class="brand" href="#">Demo</a>
      <div class="nav-collapse">
        <ul class="nav">
          <li class="active"><a href="inicio.php">Home</a></li>
           <li><a href="categorias.php">Categorias</a></li>
           <li><a href="articulos.php">Produtos</a></li>
                 <?php
        if($_SESSION['usuario']=="admin"):
         ?>
           <li><a href="usuarios.php"><span class="glyphicon glyphicon-user"></span> Administrar usuarios</a>
            </li>
         <?php 
       endif;
          ?>
        </ul>    
            <ul class="nav pull-right">
          <li class="divider-vertical"></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: red">Usuario: <?php echo $_SESSION['usuario']; ?><b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li>
              <a style="color: red" href="../processes/sair.php"><span class="glyphicon glyphicon-off"></span> Sair</a>
              </li>
            </ul>
          </li>
        </ul>
      </div><!-- /.nav-collapse -->
    </div>
  </div><!-- /navbar-inner -->
</div>




</body>
</html>

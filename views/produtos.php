<?php 
session_start();
if(isset($_SESSION['usuario'])){

	?>


	<!DOCTYPE html>
	<html>
	<head>
		<title>articulos</title>
		<?php require_once "menu.php"; ?>
		<?php require_once "../conexao/Conexion.php"; 
		$c= new conetar();
		$conexion=$c->conexion();
		$sql="SELECT id_categoria,nomeCategoria
		from categorias";
		$result=mysqli_query($conexion,$sql);
		?>
	</head>
	<body>
		<div class="container">
			<h1>Produtos</h1>
			<div class="row">
				<div class="col-sm-4">
					<form id="frmProdutos" enctype="multipart/form-data">
						<label>Categoria</label>
						<select class="form-control input-sm" id="categoriaSelect" name="categoriaSelect">
							<option value="A">Selecione a Categoria</option>
							<?php while($ver=mysqli_fetch_row($result)): ?>
								<option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
							<?php endwhile; ?>
						</select>
						<label>Nome</label>
						<input type="text" class="form-control input-sm" id="nome" name="nome">
						<label>Descrição</label>
						<input type="text" class="form-control input-sm" id="descricao" name="descricao">
						<label>Quantidade</label>
						<input type="text" class="form-control input-sm" id="quantidade" name="quantidade">
						<label>Preçoo</label>
						<input type="text" class="form-control input-sm" id="preco" name="preco">
						<label>Imagem</label>
						<input type="file" id="imagem" name="imagem">
						<p></p>
						<span id="btnAdicionarProduto" class="btn btn-primary">Adicionar</span>
					</form>
				</div>
				<div class="col-sm-8">
					<div id="tablaProdutosLoad"></div>
				</div>
			</div>
		</div>

		<!-- Button trigger modal -->
		
		<!-- Modal -->
		<div class="modal fade" id="abremodalUpdateProduto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Actualiza Produto</h4>
					</div>
					<div class="modal-body">
						<form id="frmProdutosU" enctype="multipart/form-data">
							<input type="text" id="idArticulo" hidden="" name="idArticulo">
							<label>Categoria</label>
							<select class="form-control input-sm" id="categoriaSelectU" name="categoriaSelectU">
								<option value="A">Selecione a Categoria</option>
								<?php 
								$sql="SELECT id_categoria,nomeCategoria
								from categorias";
								$result=mysqli_query($conexion,$sql);
								?>
								<?php while($ver=mysqli_fetch_row($result)): ?>
									<option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
								<?php endwhile; ?>
							</select>
							<label>Nome</label>
							<input type="text" class="form-control input-sm" id="nomeU" name="nomeU">
							<label>Descrição</label>
							<input type="text" class="form-control input-sm" id="descricaoU" name="descricaoU">
							<label>Quantidade</label>
							<input type="text" class="form-control input-sm" id="quantidadeU" name="quantidadeU">
							<label>Preço</label>
							<input type="text" class="form-control input-sm" id="precoU" name="precoU">
							
						</form>
					</div>
					<div class="modal-footer">
						<button id="btnActualizaproduto" type="button" class="btn btn-warning" data-dismiss="modal">Atualizar</button>

					</div>
				</div>
			</div>
		</div>

	</body>
	</html>

	<script type="text/javascript">
		function agregaDatosArticulo(idarticulo){
			$.ajax({
				type:"POST",
				data:"idart=" + idarticulo,
				url:"../processes/produtos/obtenDatosProduto.php",
				success:function(r){
					
					dato=jQuery.parseJSON(r);
					$('#idArticulo').val(dato['id_produto']);
					$('#categoriaSelectU').val(dato['id_categoria']);
					$('#nomeU').val(dato['nome']);
					$('#descricaoU').val(dato['descricao']);
					$('#quantidadeU').val(dato['quantidade']);
					$('#precoU').val(dato['preco']);

				}
			});
		}

		function eliminaProduto(idArticulo){
			alertify.confirm('Deseja excluir este produto?', function(){ 
				$.ajax({
					type:"POST",
					data:"idarticulo=" + idArticulo,
					url:"../processes/produtos/eliminarProduto.php",
					success:function(r){
						if(r==1){
							$('#tablaProdutosLoad').load("produtos/tablaProdutos.php");
							alertify.success("Exito!!");
						}else{
							alertify.error("não pôde ser removido");
						}
					}
				});
			}, function(){ 
				alertify.error('Cancelo')
			});
		}
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#btnActualizaproduto').click(function(){

				datos=$('#frmProdutosU').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../processes/produtos/actualizaProdutos.php",
					success:function(r){
						if(r==1){
							$('#tablaProdutosLoad').load("produtos/tablaProdutos.php");
							alertify.success("Atualizado com exito");
						}else{
							alertify.error("Error não foi atualiazada");
						}
					}
				});
			});
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#tablaProdutosLoad').load("produtos/tablaProdutos.php");

			$('#btnAdicionarProduto').click(function(){

				vacios=validarFormVacio('frmProdutos');

				if(vacios > 0){
					alertify.alert("Você deve preencher todos os campos");
					return false;
				}

				var formData = new FormData(document.getElementById("frmProdutos"));

				$.ajax({
					url: "../processes/produtos/insertaProdutos.php",
					type: "post",
					dataType: "html",
					data: formData,
					cache: false,
					contentType: false,
					processData: false,

					success:function(r){
						
						if(r == 1){
							$('#frmProdutos')[0].reset();
							$('#tablaProdutosLoad').load("produtos/tablaProdutos.php");
							alertify.success("Exito");
						}else{
							alertify.error("Falha ao fazer upload do arquivo");
						}
					}
				});
				
			});
		});
	</script>

	<?php 
}else{
	header("location:../index.php");
}
?>
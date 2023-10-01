<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Blade Enclave - Alterar Produtos</title>
	
<meta name="viewport" content="width=device-width, initial-scale=1">
	
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
<script src="jquery.mask.js"></script>

<script>
	
	
/* mscara para o preço */	
$(document).ready(function(){
	
$('#preco').mask('000.000.000.000.000,00', {reverse: true});	
	
});
	
</script>
	
<style>

.navbar{
	margin-bottom: 0;
}
	
	
</style>
	
	
	
	
</head>

<body>
	
<?php
	
	
	session_start();	
	
		if(empty($_SESSION['Status']) || $_SESSION['Status']!=1){
		header('location:index.php');
	}
	
	
	$cd = $_GET['id'];
	$cd2 = $_GET['id2'];
	
	
	
	include 'conexao.php';	
	include 'navbar.php';
	include 'cabecalho.html';
	
	
	$consulta = $comando->prepare("call spSelecionaProdCod('$cd')");	
    $consulta->execute();
	$exibe = $consulta->fetch(PDO::FETCH_ASSOC);
	$consulta->closeCursor();

	$consultaCat = $comando->prepare("call spSelecionaCategoriaCod('$cd2', '$cd2')");
	
    $consultaCat->execute();
	
	?>
	
	
	<div class="container-fluid">
	
		<div class="row">
		
			<div class="col-sm-4 col-sm-offset-4">
				
				<h2>Alteração de Produto</h2>
				
				<form method="POST" action="alterarProduto.php?cd_altera=<?php echo $cd; ?>" name="incluiProd" enctype="multipart/form-data">

				
				
					<div class="form-group">					

						<label for="sltcat">Categoria</label>

						<select class="form-control" name="sltcat">
							<?php					
								while($exibecat = $consultaCat->fetch(PDO::FETCH_ASSOC)){
							?>
							<option value="<?php echo $exibecat['cdCategoria'];?>"><?php echo $exibecat['dsCategoria'];?></option>;
							<?php }	?>	
						</select>
					</div>
					
					<div class="form-group">
				
						<label for="txtProduto">Nome do Produto</label>
						<input type="text" name="txtProduto" value="<?php echo $exibe['nmProd']; ?>"  class="form-control" required id="txtProduto">
					</div>
					
					
					
					
					
					<div class="form-group">
				
					<label for="preco">Preço</label>
					
					<input type="text" class="form-control" required name="txtpreco" value="<?php echo $exibe['vlProd']; ?>" id="preco">

					</div>
					
					<div class="form-group">
				
					<label for="txtqtde">Quantidade em Estoque</label>
					
					<input type="number" class="form-control" name="txtqtde" value="<?php echo $exibe['qtEstoque']; ?>" required id="txtqtde">

					</div>
					
					<div class="form-group">
				
					<label for="txtResumo">Resumo do Produto</label>
					
						<textarea rows="5" class="form-control" name="txtResumo"><?php echo $exibe['ResumoProd']; ?></textarea>
						

					</div>
					
					<div class="form-group">
				
					<label for="txtfoto1">Foto Principal</label>
					
					<input type="file" accept="image/*" class="form-control" name="txtfoto1" id="foto1">

					</div>
					
					<div class="form-group">
						
					<img src="imagens/<?php echo $exibe['ImgProd']; ?>" width="100px" >
						
					</div>
					
					<div class="form-group">
				
					<label for="sltlanc">Lançamento?</label>
					
					<select class="form-control" name="sltlanc">					  				
					<!-- se o sg_lancamento == S este valor estará selecionado senão vazio -->
					<option value="S" <?=($exibe['sgLancamento'] == 'S')?'selected':''?>>Sim</option>	<option value="N" <?=($exibe['sgLancamento'] == 'N')?'selected':''?>>Não</option>	  
					</select>
						

					</div>
						
					<button type="submit" class="btn btn-lg btn-default">
					
					<span class="glyphicon glyphicon-pencil"> Alterar </span>
					
				</button>
				
				</form>
				
			</div>
		</div>
	</div>
	
	<?php include 'rodape.html' ?>
	
</body>
</html>
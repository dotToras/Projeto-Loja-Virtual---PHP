<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Blade Enclave - Cadastro de Produtos</title>
	
<meta name="viewport" content="width=device-width, initial-scale=1">
	
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
<script src="jquery-mask.js"></script>

<script>
	
	
	
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
    if(empty($_SESSION['Status']) || ($_SESSION['Status']) !=1 )
    {

        header('location:index.php');

    }
	include 'conexao.php';	
	include 'navbar.php';
	include 'cabecalho.html';
	
    $consulta = $comando->prepare("call spListaCategoria()");

    $consulta->execute();
	?>
	
	
	<div class="container-fluid">
	
		<div class="row">
		
			<div class="col-sm-4 col-sm-offset-4">
				
				<h2>Cadastro de Produtos</h2>
				
				<form method="post" action="insprod.php" name="incluiProd" enctype="multipart/form-data">
				
				
					
					<div class="form-group">					
					
					<label for="sltcat">Categoria</label>
					
					<select class="form-control" name="sltCat">
					  <option value="">Selecione</option>
                      <?php while($listaCat = $consulta->fetch(PDO::FETCH_ASSOC))  {?>
					  <option value=" <?php echo $listaCat['cdCategoria'];?>"><?php echo $listaCat['dsCategoria'];?></option>	
                      
                      
                      <?php    }?>
					</select>
			
					</div>
					
					<div class="form-group">
				
						<label for="txtNome">Nome do Produto</label>
						<input name="txtNome" type="text" class="form-control" required id="txtNome">
					</div>
				
				    
					
					
					<div class="form-group">
				
					<label for="txtpreco">Preço</label>
					
					<input type="text" class="form-control"  name="txtPreco"  required id="txtPreco">

					</div>
					
					
					<div class="form-group">
				
					<label for="txtQtde">Quantidade em Estoque</label>
					
					<input type="number" class="form-control" name="txtQtde" required id="txtQtde">

					</div>
					
					
					<div class="form-group">
				
					<label for="txtResumo">Descrição do Produto</label>
					
						<textarea rows="5" class="form-control" name="txtResumo"></textarea>
						

					</div>					
					
					
					<div class="form-group">
				
					<label for="txtFoto1">Foto Principal</label>
					
					<input type="file" accept="image/*" class="form-control" name="txtFoto1" required id="txtFoto1">

					</div>
					
					<div class="form-group">
				
					<label for="sltLanc">Lançamento?</label>
					
					<select class="form-control" name="sltLanc">
					  <option value="">Selecione</option>
					  <option value="S">Sim</option>
					  <option value="N">Não</option>					  
					</select>
						

					</div>
					
							
				<button type="submit" class="btn btn-lg btn-default btn-success">
					
					<span class="glyphicon glyphicon-pencil"> Cadastrar </span>
					
				</button>
				
				</form>
				
			</div>
		</div>
	</div>
	
	<?php include 'rodape.html' ?>
	
	
	
	
</body>
</html>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Minha Loja - Logon de usu�rio</title>
	
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css" />	
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	
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
	
	
	?>
	
	
	<div class="container-fluid">
	
		<div class="row">
		
			<div class="col-sm-4 col-sm-offset-4 text-center">
				
				<h2>Área administrativa</h2>
				
				
				<a href="formProduto.php">			
				<button type="submit" class="btn btn-block btn-lg btn-primary">
					
					Incluir Produto
					
				</button>
					
				</a>
				
				<a href="Lista.php">		
				<button type="submit" class="btn btn-block btn-lg btn-warning">
					
					Alterar / Excluir Produto
					
				</button>
				</a>
				
				<a href="Vendas.php">	
				<button type="submit" class="btn btn-block btn-lg btn-success">
					
					Vendas
					
				</button>
				</a>
				
				<a href="sair.php">	
				<button type="submit" class="btn btn-block btn-lg btn-danger">
					
					Sair da Área administrativa
					
				</button>
				</a>
				
				
				
			</div>
		</div>
	</div>
	
	<?php include 'rodape.html' ?>
	
	
	
	
</body>
</html>
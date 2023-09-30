<!doctype html>

<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Blade Enclave - Busca</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="style.css" />
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
	
	include 'conexao.php';	
	include 'navbar.php';

	if(empty($_POST["txtBuscar"]))
    {

    echo "<html><script>location.href='index.php'</script></html>";

    }
	$pesquisa = $_POST["txtBuscar"];

    $consulta = $comando->prepare("call spListaBuscado('$pesquisa')");
    $consulta->execute();
    if($consulta->rowCount() == 0)
   {

    echo "<html><script>location.href='erro2.php'</script></html>";

   }
	?>
	
<div class="container-fluid">
	
<?php while($exibir = $consulta->fetch(PDO::FETCH_ASSOC)){	?>
	
	<div class="row" style="margin-top: 15px;">
		
		<div class="col-sm-1 col-sm-offset-1"><img src="Imagens/<?php echo $exibir['ImgProd'] ?>.jpg" class="img-responsive"></div>
		<div class="col-sm-5"><h4 style="padding-top:20px"><?php echo $exibir['nmProd'] ?></h4></div>
		<div class="col-sm-2"><h4 style="padding-top:20px">R$ <?php echo $exibir['vlProd'] ?></h4></div>
		<div class="col-sm-2 col-xs-offset-right-1">
				
        <button class="btn btn-lg btn-block btn-info ">
                        <a href="detalhes.php?cd=<?php echo $exibir["cdProd"]; ?>"><span class="glyphicon glyphicon-usd"> DETALHES</span></a>
        </button>
		
		
		
		</div> 
				
	</div>		
	

	
</div>

<?php
}	?>

	<?php
	
	include 'rodape.html';
	
	?>
	
</body>
</html>
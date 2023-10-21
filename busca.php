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
	#rowBusca{
	   width:100%;
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
	$consulta->closeCursor();
    $consulta->execute(); 
    if($consulta->rowCount() == 0)
   {

    echo "<html><script>location.href='erro2.php'</script></html>";

   }
	?>
	
<div class="container-fluid">
	
<?php while($exibir = $consulta->fetch(PDO::FETCH_ASSOC)){	
	  
	  $cd =  $exibir["cdProd"];
	  $consultaMedia = $comando->prepare("call spmediaAvali('$cd')");
			   
				
			   
	  $consultaMedia->closeCursor();
	  $consultaMedia->execute();
	  $exibirMedia = $consultaMedia->fetch(PDO::FETCH_ASSOC);
	  $mediaNota = $exibirMedia['media_notas']; ?>
	
	<div id="rowBusca"class="row" style="margin-top: 15px;">
		
		<div class="col-sm-1 col-sm-offset-1"><img src="Imagens/<?php echo $exibir['ImgProd'] ?>" class="img-responsive"></div>
		<div class="col-sm-3"><h4 style="padding-top:20px"><?php echo $exibir['nmProd'] ?></h4></div>

		<div class="col-sm-2 " style="padding-top:20px">
		<?php
      
      for ($i = 1; $i <= 5; $i++) {
                                    if ($i <=  $mediaNota ) {
                                        echo '<img style = " "width="35" height="35" src="https://img.icons8.com/fluency/48/star--v1.png" alt="star--v1"/>';
                                    } 

                                    if($mediaNota == null)
                                    {
                                      $mediaNota = 5;
                                      echo '<img style = " width="35" height="35" src="https://img.icons8.com/fluency/48/star--v1.png" alt="star--v1"/>';
                                    }
                                }
                                ?>
				</div>			
		<div class="col-sm-2"><h4 style="padding-top:20px">R$ <?php echo $exibir['vlProd'] ?></h4></div>
		<div class="col-sm-2 col-xs-offset-right-1">
				
        <button class="btn btn-lg btn-block btn-info " style="margin-top:18px">
                        <a href="detalhes.php?cd=<?php echo $exibir["cdProd"]; ?>"><span class="glyphicon glyphicon-usd"> DETALHES</span></a>
        </button>
		
		
		
		</div> 
				
	</div>		
	

	
</div>

<?php
}	?>



	
</body>
</html>
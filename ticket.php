<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Minha Loja</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Estilos personalizados -->
    <style>
        
        
      
        .row-header {
            margin-top: 15px;
            font-weight: bold;
            background-color: #8B0000;
            color: #fff;
            padding: 10px;
        }

        .row-data {
            margin-top: 10px;
            background-color: #fff;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        
    </style>
</head>
<body>
<?php
session_start();

if (empty($_SESSION['ID'])) {
    header("location: formlogon.php");
}
include 'conexao.php';
include 'navbar.php';


$ticket = $_GET['ticket'];

$consultaVenda = $comando->prepare("call spListarVendasUsu($ticket)");
$consultaVenda->closeCursor();
$consultaVenda->execute();
$total = 0;
?>
<div class="container">

    <div class="row mt-15">
        <h1 class="text-center">Compra :<?php echo $ticket ?></h1>
    </div>

    <div class="page-content">
        <div class="row row-header">
            <div class="col-sm-2">Data</div>
            <div class="col-sm-2">Ticket</div>
            <div class="col-sm-3">Produto</div>
            <div class="col-sm-2">Quantidade</div>
            <div class="col-sm-3">Preço</div>
        </div>
        
        <?php while ($exibir = $consultaVenda->fetch(PDO::FETCH_ASSOC)) {
            
          
            $total += $exibir['vlTotal'];
            
            ?>
            <div class="row row-data">
                <div class="col-sm-2"><?php echo date('d/m/Y',strtotime($exibir["dt_venda"]))?></div>
                <div class="col-sm-2"><?php echo $exibir["noTicket"] ?></div>
                <div class="col-sm-3"><?php echo $exibir["nmProd"] ?></div>
                <div class="col-sm-2"><?php echo $exibir["qtProd"] ?></div>
                <div class="col-sm-3">R$ <?php echo number_format($exibir["vlTotal"],2,',','.') ?></div>
            </div>

           
        <?php }   ?>

        <div class="row" style="margin-top: 15px;">
		<h2 class="text-center">Total desta compra: R$ <?php echo number_format($total,2,',','.');?></h2>
	        </div>

    </div>
</div>
<?php
include 'rodape.html';
?>
</body>
</html>

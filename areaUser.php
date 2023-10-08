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
        .navbar {
            background-color: #333;
            margin-bottom: 0;
        }
        
      
        .row-header {
            margin-top: 15px;
            font-weight: bold;
            background-color: #337ab7;
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

        .btn-custom {
            background-color: #337ab7;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }

        .btn-custom:hover {
            background-color: #23527c;
        }

        .glyphicon {
            margin-right: 5px;
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


$cd = $_SESSION['ID'];

$consultaVenda = $comando->prepare("call spListaVendas('$cd') ");
$consultaVenda->closeCursor();
$consultaVenda->execute();

?>
<div class="container">

    <div class="row mt-15">
        <h1 class="text-center">Minhas Compras</h1>
    </div>

    <div class="page-content">
        <div class="row row-header">
            <div class="col-sm-2">Data</div>
            <div class="col-sm-2">Ticket</div>
           
        </div>
        <?php while ($exibir = $consultaVenda->fetch(PDO::FETCH_ASSOC)) { ?>
            <div class="row row-data">
                <div class="col-sm-2"><?php echo date('d/m/Y',strtotime($exibir["max_dt_venda"]))?></div>
                <a href="ticket.php?ticket='<?php echo $exibir["noTicket"] ?>'"><div class="col-sm-2"><?php echo $exibir["noTicket"] ?></div></a>
       
            </div>
        <?php } ?>
    </div>
</div>
<?php
include 'rodape.html';
?>
</body>
</html>

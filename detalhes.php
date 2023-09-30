<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Blade Enclave - Detalhes do Produto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .navbar {
            margin-bottom: 0;
        }
        /* Container styles */
        .container-fluid {
            padding: 20px;
        }
        /* Product image styles */
        .product-image {
           
            padding: 10px;
        }
        /* Product title styles */
        .product-title {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        /* Product description styles */
        .product-description {
            font-size: 16px;
            margin-bottom: 20px;
        }
        /* Product category styles */
        .product-category {
            font-size: 18px;
            font-weight: bold;
        }
        /* Product price styles */
        .product-price {
            font-size: 24px;
            font-weight: bold;
            color: #00a65a;
            margin-top: 10px;
        }
        /* Buy button styles */
        .buy-button {
            font-size: 20px;
            padding: 10px 20px;
            background-color: #00a65a;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .buy-button:hover {
            background-color: #008749;
        }
    </style>
</head>

    <?php
    session_start();
    include 'conexao.php';    
      
    ?>
    <?php
    if(!empty($_GET['cd'])){
    $cdProd = $_GET['cd'];
    $consulta = $comando->prepare("call listarProdutosDetalhes('$cdProd')");
    $consulta->execute();
    $exibir = $consulta->fetch(PDO::FETCH_ASSOC);
    }

    else {
        header("location:index.php");
    }
    ?>

    <?php
    include 'navbar.php';
    ?>
    
    <body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1 product-image">
                <h1 class="product-title">Detalhes do Produto</h1>
                <img src="Imagens/<?php echo $exibir['ImgProd'] ?>.jpg" class="img-responsive" style="width:100%;">
            </div>
            <div class="col-sm-7">
                <h1 class="product-title"><?php echo $exibir['nmProd'] ?></h1>
                <p class="product-description"><?php echo $exibir['ResumoProd'] ?></p>
                <p class="product-category"><?php echo $exibir['dsCategoria'] ?></p>
                <p class="product-price">R$ <?php echo $exibir['vlProd'] ?></p>
                <button class="btn btn-lg buy-button">Comprar</button>
            </div>
        </div>
    </div>
    <?php
    include 'rodape.html';
    ?>
</body>
</html>

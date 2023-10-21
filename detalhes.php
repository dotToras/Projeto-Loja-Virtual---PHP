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
        .comment-container {
        background-color: #fff;
        border-radius: 5px;
        margin-bottom: 20px;
        padding: 15px;
        box-shadow: 0px 0px 10px 0px #ccc;
    }

    .comment-header {
        display: flex;
        align-items: center;
        padding: 10px;
    }

    .comment-header img {
        width: 65px;
        height: 65px;
    }

    .comment-details {
        margin-left: 10px;
    }

    .comment-author {
        font-weight: bold;
    }

    .comment-date {
        color: #777;
    }

    .comment-content {
        padding: 10px;
    }

    .comment-text {
        margin-bottom: 0;
    }
      
    </style>
</head>

    <?php
    session_start();
    include 'conexao.php';    
    include 'navbar.php';

    ?>
    <?php
    if(!empty($_GET['cd'])){
    $cdProd = $_GET['cd'];
    $consulta = $comando->prepare("call listarProdutosDetalhes('$cdProd')");
    $consulta->closeCursor();
    $consulta->execute();
    $exibir = $consulta->fetch(PDO::FETCH_ASSOC);

    // exibir média avaliações

    $consultaMedia = $comando->prepare("call spmediaAvali('$cdProd')");
           
            
           
    $consultaMedia->closeCursor();
    $consultaMedia->execute();
    $exibirMedia = $consultaMedia->fetch(PDO::FETCH_ASSOC);
    $mediaNota = $exibirMedia['media_notas']; 
    include 'modalAvaliacao.php';
    }

    else {
        header("location:index.php");
    }
    ?>

   
    <body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1 product-image">
                <h1 class="product-title">Detalhes do Produto</h1>
                <img src="Imagens/<?php echo $exibir['ImgProd'] ?>" class="img-responsive" style="width:100%;">
            </div>
            <div class="col-sm-7">
                <h1 class="product-title"><?php echo $exibir['nmProd'] ?></h1>
                <?php
      
                         for ($i = 1; $i <= 5; $i++) {
                                    if ($i <=  $mediaNota ) {
                                        echo '<img style = " width="35" height="35" src="https://img.icons8.com/fluency/48/star--v1.png" alt="star--v1"/>';
                                    } 

                                    if($mediaNota == null)
                                    {
                                      $mediaNota = 5;
                                      echo '<img style = " width="35" height="35" src="https://img.icons8.com/fluency/48/star--v1.png" alt="star--v1"/>';
                                    }
                                }
                                ?>
                <p class="product-description"><?php echo $exibir['ResumoProd'] ?></p>
                <p class="product-category"><?php echo $exibir['dsCategoria'] ?></p>
                <p class="product-price">R$ <?php echo $exibir['vlProd'] ?></p>
              
   <?php if($exibir['qtEstoque'] > 0){?> <!-- If para verificar se existe quantidade de estoque e então exibir botão de compra -->

              <button class="btn btn-lg btn-success">
             <a href="carrinho.php?cd=<?php echo $exibir["cdProd"]; ?>">
             <span class="glyphicon glyphicon-info-sign">  COMPRAR</span></a>
            </button>

            <?php  } else{?> <!-- Se não, exibir botão de indisponivel -->

            <button class="btn btn-lg  btn-danger" disabled>
            <span class="glyphicon glyphicon-remove-circle"> INDISPONIVEL</span>
            </button>

            <?php   }  ?>

                <h4 style = " text-decoration: underline;" data-toggle="modal" data-target="#meuModal">Deixe uma avaliação sobre esse produto</h4>
            </div>
        </div>
    </div>

    <?php  
    
    $consultaA = $comando->prepare("call spSelectAvali('$cdProd') ");
   $consultaA->closeCursor();
    $consultaA->execute();

 
  
    
    ?>
    



    <?php
    include 'comentarios.php';
    ?>



   
    <?php
    include 'rodape.html';
    ?>


    
</body>
</html>


    
</body>
</html>

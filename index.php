<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blade Enclave</title>
<<<<<<< HEAD
    <link rel="stylesheet" href="estilo.css" />

    
=======
>>>>>>> a6f1d5e3eab145df0dbe9167af840328279bd50e

    <!-- CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<<<<<<< HEAD
=======
<link rel="stylesheet" href="estiloo.css">
>>>>>>> a6f1d5e3eab145df0dbe9167af840328279bd50e

<!-- jQuery livraria -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- JavaScript compilado-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>

          <?php
             include "navbar.php";
             include "cabecalho.html";
            
<<<<<<< HEAD
             include 'conexao.php';
             $consulta = $comando->prepare("CALL listarProdutos()");
             $consulta->execute();  
          ?>

          <div class="container-fluid d-flex align-items-center">

              <div class="row text-center centered div">

              <?php   while ($exibe = $consulta->fetch(PDO::FETCH_ASSOC)) {  ?>
              <div class="col-sm-4 centered centered-content">
                    <img src="Imagens/<?php  echo $exibe['ImgProd']?>.jpg" class="img-responsive">
                    <div><h1><?php  echo $exibe['nmProd']?></h1></div>
                  <hr>
                    <div><h4>R$<?php  echo $exibe['vlProd']?></h4></div>
                </div>

                <?php }  ?>
=======
          ?>

          <div class="container-fluid">

              <div class="row text-center">


              <div class="col-sm-3">
                    <img src="https://placehold.it/450x320" class="img-responsive">
                    <div><h1>Nome do Produto</h1></div>
                    <div><h4>R$ 5.600</h4></div>
                </div>

                <div class="col-sm-3">
                    <img src="https://placehold.it/450x320" class="img-responsive">
                    <div><h1>Nome do Produto</h1></div>
                    <div><h4>R$ 5.600</h4></div>
                </div>

                <div class="col-sm-3">
                    <img src="https://placehold.it/450x320" class="img-responsive">
                    <div><h1>Nome do Produto</h1></div>
                    <div><h4>R$ 5.600</h4></div>
                </div>

                <div class="col-sm-3">
                    <img src="https://placehold.it/450x320" class="img-responsive">
                    <div><h1>Nome do Produto</h1></div>
                    <div><h4>R$ 5.600</h4></div>
                </div>
>>>>>>> a6f1d5e3eab145df0dbe9167af840328279bd50e

              </div><!--fechamento da classe rw-->

          </div><!--fechamento da classe conteiner fluid-->

          <?php include "rodape.html";   ?>
</body>

</html>
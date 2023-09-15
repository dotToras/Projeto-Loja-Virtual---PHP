<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blade Enclave</title>
    <link rel="stylesheet" href="estilo.css" />

    

    <!-- CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


<!-- jQuery livraria -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- JavaScript compilado-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>

          <?php
             include "navbar.php";
             include "cabecalho.html";
            
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

              </div><!--fechamento da classe rw-->

          </div><!--fechamento da classe conteiner fluid-->

          <?php include "rodape.html";   ?>
</body>

</html>
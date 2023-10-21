<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blade Enclave</title>
    <link rel="stylesheet" href="style.css" />

    

    <!-- CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


<!-- jQuery livraria -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- JavaScript compilado-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>

          <?php

              session_start();

          //Includes

             include "navbar.php";
             include "Carrossel.php";
             include 'conexao.php';
             
            

             //chamando a procudure
             $consulta = $comando->prepare("CALL listarProdutos()" ); 
            
             $consulta->execute();  //executando a procedure
             
           

          
       
         
             

          ?>

<div class="container-fluid d-flex align-items-center">

<div class="row text-center centered div">

<!-- Laço de repetição para exibir todos os produtos cadastrados -->

<?php   while ($exibe = $consulta->fetch(PDO::FETCH_ASSOC)) { 
  
  $cd =  $exibe["cdProd"];
  $consultaMedia = $comando->prepare("call spmediaAvali('$cd')");
           
            
           
  $consultaMedia->closeCursor();
  $consultaMedia->execute();
  $exibirMedia = $consultaMedia->fetch(PDO::FETCH_ASSOC);
  $mediaNota = $exibirMedia['media_notas']; ?>

<div class="col-sm-4 centered centered-content">

      <img src="Imagens/<?php  echo $exibe['ImgProd']?>" class="img-responsive">
      <div><h1><?php  echo mb_strimwidth( $exibe['nmProd'],0,30,'...' ); ?></h1></div> <!-- Utilizndo mb_strimwidth para limitar o númer de caracteres -->
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
    <hr>
      <div><h4>R$<?php  echo number_format($exibe['vlProd'] ,2,',','.'); ?></h4></div> <!-- Utilizando number-format para formatar o valor recebido no formato numérico -->
      <hr>
      <div class="text-center">

      <button class="btn btn-lg btn-block btn-info">
      <a href="detalhes.php?cd=<?php echo $exibe["cdProd"]; ?>">
          <span class="glyphicon glyphicon-usd"> DETALHES</span></a>
          </button>


      <?php if($exibe['qtEstoque'] > 0){?> <!-- If para verificar se existe quantidade de estoque e então exibir botão de compra -->

          <button class="btn btn-lg btn-block btn-success">
          <a href="carrinho.php?cd=<?php echo $exibe["cdProd"]; ?>">
            <span class="glyphicon glyphicon-info-sign">  COMPRAR</span></a>
          </button>

          <?php  } else{?> <!-- Se não, exibir botão de indisponivel -->

          <button class="btn btn-lg btn-block btn-danger" disabled>
          <span class="glyphicon glyphicon-remove-circle"> INDISPONIVEL</span>
          </button>

          <?php   }  ?>
      </div>
  </div>

  <?php }  ?>

</div><!--fechamento da classe rw-->

</div><!--fechamento da classe conteiner fluid-->

          <?php include "rodape.html";   ?>

   
</body>

</html>
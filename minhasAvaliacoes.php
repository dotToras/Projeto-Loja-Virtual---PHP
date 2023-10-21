<link rel="stylesheet" href="style.css" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery livraria -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- JavaScript compilado-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
       .comment-container {
        background-color: #fff;
        border-radius: 5px;
        margin-bottom: 20px;
        padding: 15px;
        width:100%;
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
     body{
        overflow-x:hidden;
      }
   #containerMinhasAva{
    width:70vw;
   }
    </style>
<?php 

session_start();
include 'conexao.php';
include 'navbar.php';
include 'sidebar.php';
$CD = $_SESSION['ID'];
$consulta->closeCursor();
$consultaA = $comando->query("select * from vwAvaliacao where cdUsuario = '$CD'");


?>

<body>

<section class="gradient-custom">
   

    <?php


if ($consultaA->rowCount() > 0) {
        while ($exibirA = $consultaA->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <div id="containerMinhasAva"class="container my-5 py-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="comment-container">
                            <div class="comment-header">
                                <img src="Imagens - Usuario/<?php echo $exibirA['imgUsuario'] ?>" style="border-radius: 1vw;border: solid 0.1vw black;" alt="avatar" width="65" height="65">
                                <span style = "margin-left:1vw;"><?php echo $exibirA['nomeAutor'] ?></span> -  <?php echo date_Format(date_create($exibirA['dataAva']), 'd/m/Y'); ?>
                              
                            </div>
                            

                            <div class="comment-content">

                           
                            <?php
                            
                                $notaAva = $exibirA['notaAva'];
                                for ($i = 1; $i <= 5; $i++) {
                                    if ($i <= $notaAva) {
                                        echo '<img style = "margin-top:2vw;" width="25" height="25" src="https://img.icons8.com/fluency/48/star--v1.png" alt="star--v1"/>';
                                    } 
                                }
                                
                                
                                   
                                ?>
                                
                                <p style="text-wrap: center; "> <?php echo $exibirA['comentarioAva'] ?></p>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        
    } else {
        // Se não há avaliações, exiba a mensagem correspondente
        ?>
        <div class="container my-5 py-5">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">Você ainda não fez nenhuma avaliação</h1>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</section>

</body>
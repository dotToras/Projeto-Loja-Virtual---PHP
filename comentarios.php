<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">


<section class="gradient-custom">
    <h2 class="text-center">Avaliações</h2>

    <?php


if ($consultaA->rowCount() > 0) {
        while ($exibirA = $consultaA->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <div class="container my-5 py-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="comment-container">
                            <div class="comment-header">
                                <img src="Imagens - Usuario/<?php echo $exibirA['imgUsuario'] ?>" style="border-radius: 1vw;border: solid 0.1vw black;" alt="avatar" width="65" height="65">
                                <span style = "margin-left:1vw;"><?php echo $exibirA['nomeAutor'] ?></span> -  <?php echo date_Format(date_create($exibirA['dataAva']), 'd/m/Y'); ?>
                              
                            </div>
                            

                            <div class="comment-content">

                            <?php if(isset($_SESSION['Status']) && $_SESSION['Status'] == 1  ) { ?>
                            <a href="deletarAvali.php?cdProd=<?php echo $cdProd ?>&cd=<?php echo $exibirA['cdAvali'] ?>"><img  style="position:absolute;margin-left:72vw;margin-top:-4vw;" width="65" height="65" src="https://img.icons8.com/color/48/delete-sign--v1.png" alt="delete-sign--v1"/></a>
                            <?php } ?>
                            <?php
                            
                                $notaAva = $exibirA['notaAva'];
                                for ($i = 1; $i <= 5; $i++) {
                                    if ($i <= $notaAva) {
                                        echo '<img style = "margin-top:-2vw;" width="25" height="25" src="https://img.icons8.com/fluency/48/star--v1.png" alt="star--v1"/>';
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
                    <h3 class="text-center">Ainda não há avaliações para esse produto</h3>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</section>
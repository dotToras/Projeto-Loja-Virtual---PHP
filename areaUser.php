<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Minha Loja</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery livraria -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- JavaScript compilado-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Estilos personalizados -->
    <style>
     /* Estilos para barras de navegação */
.navbar {
    background-color: #333;
    margin-bottom: 0;
}

/* Estilos para cabeçalho (row-header) */
.row-header {
    margin-top: 3%;
    font-weight: bold;
    background-color: #8B0000;
    color: #fff;
    padding: 1rem;
}

/* Estilos para conteúdo (row-data) */
.row-data {
    margin-top: 2%;
    background-color: #fff;
    padding: 1rem;
    border: 1px solid #ccc;
    border-radius: 3px;
}

/* Estilos para botões personalizados (btn-custom) */
.btn-custom {
    background-color: #337ab7;
    color: #fff;
    border: none;
    padding: 1rem 2rem;
    border-radius: 3px;
    cursor: pointer;
}

.btn-custom:hover {
    background-color: #23527c;
}

/* Espaçamento para ícones */
.glyphicon {
    margin-right: 5px;
}

/* Estilos para links */
#LinkTicket {
    color: black;
}

#LinkTicket:hover {
    color: grey;
}

#containerCompras{
 margin-top: 4vw;
    width:100% !important;
    flex-wrap: wrap;
}
/* Media query para ajustar estilos em telas menores */
@media (max-width: 768px) {
    .row-header {
        font-size: 1rem;
        padding: 0.5rem;
    }

    .row-data {
        margin-top: 1%;
        padding: 0.5rem;
    }

    .btn-custom {
        padding: 0.5rem 1rem;
    }
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
include 'sidebar.php';	
?>
<div  id ="containerCompras"class="container">

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
                <a id="LinkTicket"href="ticket.php?ticket='<?php echo $exibir["noTicket"] ?>'"><div class="col-sm-2"><?php echo $exibir["noTicket"] ?></div></a>
       
            </div>
        <?php } ?>
    </div>
</div>
</div>
</div>

</body>
</html>

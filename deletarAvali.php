<?php

include 'conexao.php';

$cdAvali = $_GET['cd'];
$deletar = $comando->prepare("call spDeleteAvali($cdAvali)");
$deletar->execute();
$cdProd  = $_GET['cdProd'];

header("location:detalhes.php?cd=$cdProd");
?>
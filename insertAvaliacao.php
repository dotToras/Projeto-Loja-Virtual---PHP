<?php

include 'conexao.php';
session_start();

	
	// verificando se usuário está logado

    if(empty($_SESSION['ID']))
    {
		
		header('location:formlogon.php'); // enviando para formlogon.php
		
    }
 
$consultaNome = $comando->prepare("call spMostraUsuario('$_SESSION[ID]')");
$consultaNome->execute();

$exibirNome = $consultaNome->fetch(PDO::FETCH_ASSOC);

$nome = $exibirNome['nmUsuario'] ;
$cdUsu = $_SESSION['ID'];
$cdProd = $_GET['cd'];
$comentario = $_POST['comentario'];
$nota = $_POST['nota'];
$dataAtual = date("Y/m/d");

$inserirAvaliacao = $comando->prepare("call spInsertAvali('$nome','$dataAtual', '$nota', '$comentario', '$cdUsu', '$cdProd')");

$consultaNome->closeCursor();
$inserirAvaliacao->execute();

header("location:detalhes.php?cd=$cdProd");

?>
<?php

include 'conexao.php';  // conexao com banco de dados

$cd=$_GET['id'];  // pegando o id que é enviado pelo botão excluir que esta na pagina lista.php


$pasta = "imagens/"; //localizar pasta aonde estão as imagens

// criando consulta pelo id que foi pego
$consulta = $comando->prepare("call spSelecionaProdCod('$cd')"); 
$consulta->execute();

//criando um array para exibir os dados
$exibe = $consulta->fetch(PDO::FETCH_ASSOC);

$consulta->closeCursor();
// comando para excluir o registro pelo cd_livro que foi recebido na variavel.
$excluir = $comando->query("call spExcluiProduto('$cd')");

$foto1=$exibe['ImgProd'];  //salvando nesta variável a imagem do select

if ($foto1!="") {  // se o conteudo não estiver vazio o comando unlink fará a exclusão, indicando a pasta
	
	unlink($pasta.$foto1);
	
}

//redirecionado usuario para página lista.php
header('location:lista.php');

?>
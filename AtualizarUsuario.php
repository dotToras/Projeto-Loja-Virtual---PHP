<?php

session_start(); // iniciando sessão
	
// verificando se usuário está logado


if(empty($_SESSION['ID']))
{
    
    header('location:formlogon.php'); // enviando para formlogon.php
    
}
include 'conexao.php';
include 'resize-class.php';
$cod = $_SESSION['ID'];
$nome =$_POST['nmUsuario'];
$email =$_POST['dsEmail'];
$endereco =$_POST['dsEndereco'];
$cidade =$_POST['dsCidade'];
$cep =$_POST['noCep'];

$recebe_foto1 = $_FILES['imgUsuario'];

$destino = "Imagens - Usuario/";  

//gerando nome aleatorio para imagem
// preg_match vai pegar imagens nas extensões jpg|jpeg|png|gif
// do nome que esta na variavel $recebe_foto1 do parametro name e a $extensão vai receber o formato
preg_match("/\.(jpg|jpeg|png|gif){1}$/i",$recebe_foto1['name'],$extencao1);

// a função md5 vai gerar um valor randomico  com base no horario "time"
// incrementar o ponto e a extensão
// função md5 é criado para gerar criptografia
$img_nome1 = md5(uniqid(time())).".".$extencao1[1];


move_uploaded_file($recebe_foto1['tmp_name'], $destino.$img_nome1);             
$resizeObj = new resize($destino.$img_nome1);
$resizeObj -> resizeImage(1280, 1280);
$resizeObj -> saveImage($destino.$img_nome1, 100);

$alterar = $comando->prepare("call spAtualizarUsuario('$nome', '$email', '$endereco', '$cidade', '$cep', '$img_nome1','$cod')");

$alterar->execute();

header('location:index.php');
?>
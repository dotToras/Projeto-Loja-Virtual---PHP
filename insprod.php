<?php

include 'conexao.php';  // include com arquivo de conexao
include 'resize-class.php';
//variáveis que vão receber os dados do formulário que esta na pagina formProduto

$cdCat = $_POST['sltCat'];  // recebendo o valor do campo select, valor numérico
$nome = $_POST['txtNome'];
$preco = $_POST['txtPreco'];
$qtde = $_POST['txtQtde'];
$resumo = $_POST['txtResumo'];
$lanc = $_POST['sltLanc'];

$remover1='.';  // criando variável e atribuindo o valor de ponto para ela
$preco = str_replace($remover1, '', $preco); // removendo ponto de casa decimal,substituindo por vazio
$remover2=','; // criando variável e atribuindo o valor de virgula para ela
$preco = str_replace($remover2, '.', $preco); // removendo virgula de casa decimal,substituindo por ponto

$recebe_foto1 = $_FILES['txtFoto1'];

$destino = "Imagens/";  // informando para qual diretorio será enviado a imagem


//gerando nome aleatorio para imagem
// preg_match vai pegar imagens nas extensões jpg|jpeg|png|gif
// do nome que esta na variavel $recebe_foto1 do parametro name e a $extensão vai receber o formato
preg_match("/\.(jpg|jpeg|png|gif){1}$/i",$recebe_foto1['name'],$extencao1);

// a função md5 vai gerar um valor randomico  com base no horario "time"
// incrementar o ponto e a extensão
// função md5 é criado para gerar criptografia
$img_nome1 = md5(uniqid(time())).".".$extencao1[1];


try {  // try para tentar inserir
	
	$inserir=$comando->prepare("call inserirProduto(?, ?, ?, ?, ?, ?, ?)");

    $inserir->bindParam(1, $nome);
    $inserir->bindParam(2, $preco);
    $inserir->bindParam(3, $cdCat );
    $inserir->bindParam(4, $qtde);
    $inserir->bindParam(5, $resumo);
    $inserir->bindParam(6, $img_nome1);
    $inserir->bindParam(7, $lanc);

    
    $inserir->execute();
	
    move_uploaded_file($recebe_foto1['tmp_name'], $destino.$img_nome1);             
    $resizeObj = new resize($destino.$img_nome1);
    $resizeObj -> resizeImage(1280, 1280);
    $resizeObj -> saveImage($destino.$img_nome1, 100);
	
    header('location:index.php');
}catch(PDOException $e) {  // se houver algum erro explodir na tela a mensagem de erro
	
	
	echo $e->getMessage();
	
}

?>
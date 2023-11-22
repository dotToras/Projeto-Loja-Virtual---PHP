<link rel="stylesheet" href="style.css" />

<?php
// iniciando a sessão, pois precisamos pegar o cd do usuario logado para salvar na tabela de vendas no campo cd_cliiente
session_start();  

include 'conexao.php';

$linkPagamento = $_GET['linkPagamento'];

$data = date('Y-m-d');  // variavel que vai pegar a data do dia (ano mes dia -padrão do mysql)
$ticket = uniqid();  // gerando um ticket com função uniqid(); 	gera um id unico    
$cd_user = $_SESSION['ID'];  //recebendo o codigo do usuário logado, nesta pagina o usuario ja esta logado pois, em do carrinho de compra

//// criando um loop para sessão carrinho q recebe o $cd e a quantidade
foreach ($_SESSION['carrinho'] as $cd => $qnt)  {
    $consulta = $comando->query("select vlProd FROM tbProdutos WHERE cdProd='$cd'");
    $exibe = $consulta->fetch(PDO::FETCH_ASSOC);
    $preco = $exibe['vlProd'];
    
	
	$inserir = $comando->prepare("call spInserirVenda('$ticket','$cd_user','$cd','$qnt','$preco', '$data')");
	
    $inserir->execute();
}
 

include 'fim.php';


?>


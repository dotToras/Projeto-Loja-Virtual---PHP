<?php 

include 'conexao.php';

//  Iniciando uma sessão

session_start();

$Vemail = $_POST['txtEmail'];

$Vsenha = $_POST['txtSenha'];

$consulta = $comando->prepare("call spVerificaUsuario('$Vemail', '$Vsenha')");

$consulta->execute();

if($consulta->rowCount() == 1)
{

  $exibeUsuario = $consulta->fetch(PDO::FETCH_ASSOC);

  if($exibeUsuario['dsStatus'] == 0)
  {

  
    $_SESSION['ID'] = $exibeUsuario['cdUsuario'];
    $_SESSION['Status'] = 0;
    header('location:index.php');
  }
 else
 {

  $_SESSION['ID'] = $exibeUsuario['cdUsuario'];
    $_SESSION['Status'] = 1;
    header('location:index.php');

 }

}
else
{
    header('location:erro.php');
}
?>
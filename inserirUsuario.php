<?php

//Includes

   include 'conexao.php';

   $nome = $_POST["txtNome"];
   $email = $_POST["txtEmail"];
   $senha = $_POST["txtSenha"];
   $end = $_POST["txtEndereco"];
   $cidade = $_POST["txtCidade"];
   $cep = $_POST["txtCep"];

   $consulta = $comando->prepare("CALL spVerificaEmail(?)");
   $consulta->bindParam(1, $email, PDO::PARAM_STR);
   $consulta->execute();
   $exibe = $consulta->fetch(PDO::FETCH_ASSOC);

   if($consulta->rowCount() == 1){

  header('location:erro1.php');
   }
   else{

    $consulta->closeCursor();
    $incluir = $comando->prepare("call spInserirUsuario(?, ?, ?, '0', ?, ?, ?)");

    $incluir->bindParam(1, $nome);
    $incluir->bindParam(2, $email);
    $incluir->bindParam(3, $senha );
    $incluir->bindParam(4, $end);
    $incluir->bindParam(5, $cidade);
    $incluir->bindParam(6, $cep);

    $incluir->execute();

    header('location:ok.php');
   }
?>

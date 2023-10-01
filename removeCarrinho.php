<?php

//iniciando a sessão
 session_start();

//pegando o codigo
 $cdProd = $_GET['cd'];

 unset($_SESSION['carrinho'][$cdProd]);

    header("location:carrinho.php");
?>
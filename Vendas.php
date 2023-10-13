<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>BladeEnclave - Logon de usuário</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="jquery-mask.js"></script>


</head>





<body>


<?php
session_start();
include 'conexao.php';
include 'navbar.php';


?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<h3 class="text-center">Vendas Totais</h3>
<div class="chart-container" style=" margin-left:9vw;height: 60vh; width: 80vw; display: flex; align-items: center; justify-content: center;">
  <canvas id="VendasTotais"></canvas>
</div>


<?php

include 'rodape.html';
include 'graficoVendasTotais.php';


?>
</body>
</html>
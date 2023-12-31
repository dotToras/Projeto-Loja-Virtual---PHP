<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Blade Enclave - Erro de Login</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css" />
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


	<style>
		.navbar {
			margin-bottom: 0;
		}

		#adm {
			margin-top: -0.4rem;
		}
	</style>


</head>

<body>

	<?php
	session_start();
	include 'conexao.php';
	include 'navbar.php';
	

	?>


	<div class="container-fluid">

		<div class="row">

			<div class="col-sm-4 col-sm-offset-4 text-center">

				<h2>Usuário ou senha incorreto!!</h2>

				<a href="formlogon.php" class="btn btn-block btn-default" role="button">Tentar Novamente</a>

				<a href="formUsuario.php">
					<button type="button" class="btn btn-lg btn-link">Ainda não sou cadastrado</button>
				</a>

			</div>
		</div>
	</div>

	<?php include 'rodape.html' ?>


</body>

</html>
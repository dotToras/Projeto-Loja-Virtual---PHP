<!doctype html>

<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Minha Loja</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
    <link rel="stylesheet" href="estilo.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
    <style>
    #containerPerfil

    {
        margin-top: 4vw;
    width:100% !important;
    
    }

    .profile-avatar {
    width: 15vw; /* Adjust the size as needed */
    height: 15vw; /* Adjust the size as needed */
    border-radius: 50%; /* Makes it circular */
    border: 0.1vw solid #2b1111; /* Add a white border for a clean look */
    display: block; /* Center horizontally */
    margin: 0 auto; /* Center horizontally */
}

        </style>
</head>

<body style="overflow-x: hidden !important ;">	
	
<?php
	
  
	session_start(); // iniciando sessão
	
	// verificando se usuário está logado

    
    if(empty($_SESSION['ID']))
    {
		
		header('location:formlogon.php'); // enviando para formlogon.php
		
	}

	include 'conexao.php';	// incluindo arquivo de conexão
	include 'navbar.php'; // incluindo arquivo barra de navegação
	
   $consulta = $comando->prepare("call spListarUsuario('$_SESSION[ID]')");
   $consulta->closeCursor();
   $consulta->execute();
   $exibir = $consulta->fetch(PDO::FETCH_ASSOC);

   include 'sidebar.php';
    ?>

<div id="containerPerfil" class="container mt-5">
        <h1>Editar Usuário</h1>
        <form action="AtualizarUsuario.php" method="POST" enctype="multipart/form-data">
             <!-- Campo Imagem do Usuário -->
             <div class="form-group">
                <label for="imgUsuario">Imagem do Usuário:</label>
                <input type="file" class="form-control-file" id="imgUsuario" name="imgUsuario">
            </div>

            <div class="form-group">
						
					<img class="profile-avatar" src="Imagens - Usuario/<?php echo $exibir['imgUsuario']; ?>" >
						
					</div>
            <!-- Campo Nome do Usuário -->
            <div class="form-group">
                <label for="nmUsuario">Nome do Usuário:</label>
                <input type="text" value="<?php echo $exibir['nmUsuario']; ?>" class="form-control" id="nmUsuario" name="nmUsuario" required>
            </div>
            <!-- Campo Email -->
            <div class="form-group">
                <label for="dsEmail">Email:</label>
                <input type="email" value="<?php echo $exibir['dsEmail']; ?>" class="form-control" id="dsEmail" name="dsEmail" required>
            </div>
            
            <!-- Campo Endereço -->
            <div class="form-group">
                <label for="dsEndereco">Endereço:</label>
                <input type="text" value="<?php echo $exibir['dsEndereco']; ?>" class="form-control" id="dsEndereco" name="dsEndereco" required>
            </div>
            <!-- Campo Cidade -->
            <div class="form-group">
                <label for="dsCidade">Cidade:</label>
                <input type="text"value="<?php echo $exibir['dsCidade']; ?>" class="form-control" id="dsCidade" name="dsCidade" required>
            </div>
            <!-- Campo CEP -->
            <div class="form-group">
                <label for="noCep">CEP:</label>
                <input type="text" value="<?php echo $exibir['noCep']; ?>" class="form-control" id="noCep" name="noCep" required>
            </div>
            <!-- Botão de Submit -->
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </form>
    </div>

    </div>
		</div>

        </div>
		</div>

</body>
</html>
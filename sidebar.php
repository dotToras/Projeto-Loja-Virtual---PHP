
		<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="sidebarstyle.css">
        <link rel="stylesheet" href="style.css" />

        </head>
<?php
		// incluindo arquivo barra de navegação
  
	
	
	// verificando se usuário está logado

    
    if(empty($_SESSION['ID']))
    {
		
		header('location:formlogon.php'); // enviando para formlogon.php
		
	}

	include 'conexao.php';	// incluindo arquivo de conexão

	
   $consulta = $comando->prepare("call spListarUsuario('$_SESSION[ID]')");
   $consulta->closeCursor();
   $consulta->execute();
   $exibir = $consulta->fetch(PDO::FETCH_ASSOC);
    ?>

  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	        </button>
        </div>
	  		<div class="img bg-wrap text-center py-4" style="background-image: url(Imagens\ -\ Background/fundo.jpg);">
	  			<div class="user-logo">
	  				<div class="img" style="background-image: url('Imagens - Usuario/<?php echo $exibir['imgUsuario']; ?>');"></div>
	  				<h3><?php echo $exibir['nmUsuario']; ?></h3>
	  			</div>
	  		</div>
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="index.php"><span class="fa fa-home mr-3"></span> Home</a>
          </li>
          <li>
              <a href="editarUsuario.php"><span class="fa fa-user mr-3 "><small class="d-flex align-items-center justify-content-center"></small></span> Perfil</a>
          </li>
          <li>
            <a href="areaUser.php"><span class="fa fa-shopping-cart mr-3"></span> Minhas Compras</a>
          </li>
          <li>
            <a href="minhasAvaliacoes.php"><span class="fa fa-comments mr-3"></span>Minhas Avaliações</a>
          </li>
          <li>
            <a href="sair.php"><span class="fa fa-sign-out mr-3"></span> Sair</a>
          </li>
        </ul>

    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
   
  

<script src="main.js"></script>
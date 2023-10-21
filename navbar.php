<style>
/* Adicionar sombra à navbar */
.navbar-custom {
    background-color: #8B0000; /* Vermelho vinho */
    box-shadow: 0 0.3vw #550000; /* Sombra escura abaixo da navbar */
    border-radius: 0;
}
/* Estilo para o campo de pesquisa responsivo */
.navbar-form .form-control {
    width: 100%; /* Ocupar toda a largura disponível */
    max-width: 250px; /* Defina um tamanho máximo para evitar que ele se expanda demais */

}

/* Define a cor do texto da navbar para preto */
.navbar-custom .navbar-brand,
.navbar-custom .navbar-nav > li > a {
    color: #fff; /* Fonte preta */
}
.navbar-custom .navbar-brand,
.navbar-custom .navbar-nav > li > a:hover {
    color: #b9a91a; /* Fonte preta */
}
/* Define a cor das barras do botão de navegação quando em modo de colapso */
.navbar-custom .navbar-toggle .icon-bar {
    background-color: #b9a91a;
}
.navbar-custom .dropdown-menu {
    z-index: 1000;
}
/* Media query para ajustar o campo de pesquisa em telas menores */
@media (max-width: 768px) {
    .navbar-form .form-control {
        max-width: 100%; /* Em telas menores, permita que ele ocupe toda a largura disponível */
    }
}

</style>

<?php

include 'conexao.php';
?>

<nav class="navbar navbar-custom navbar-inverse ">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Blade Enclave</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li ><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
        <li><a href="Lanc.php">Lançamentos</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categorias<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="categoria.php?cat=Katanas">Katanas</a></li>
            <li><a href="categoria.php?cat=Espadas Longas">Espadas Longas</a></li>
            <li><a href="categoria.php?cat=Adagas">Adagas</a></li>
            <li><a href="categoria.php?cat=Jian">Jian</a></li>
            
        
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search" name="frmPesquisa" method="post" action="busca.php">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Busque o que deseja..." name="txtBuscar">
        </div>
        <button type="submit" class="btn btn-default">Pesquisar</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
    

      
    
        <?php 
        if(empty($_SESSION['ID'])) { ?>

        <li><a href="formlogon.php"><span class="glyphicon glyphicon-log-in"> Login</span></a></li>
        <?php  }
         else
        {

          if($_SESSION['Status'] == 0)
          {
          $consultaUsuario = $comando->prepare("call spMostraUsuario('$_SESSION[ID]')");
          $consultaUsuario->execute();
          $exibeUsuario = $consultaUsuario->fetch(PDO::FETCH_ASSOC);
         ?>
  
    <?php if($exibeUsuario['imgUsuario'] != null) {?>

    <li><img class="mt-6"style="border-radius:50%; margin-top:0.2vw;border:0.1vw solid black;" src="Imagens - Usuario/<?php echo $exibeUsuario['imgUsuario'] ?>" alt="Avatar" width="45" height="42" > </li>
    <?php } ?>
    <li><a href="editarUsuario.php?cd='<?php echo $_SESSION['ID'] ?> "><?php echo $exibeUsuario['nmUsuario'] ?></a></li>


    <li><a href="sair.php">Sair</a></li>
        <?php }
         else
          {
        ?>
        <li><a href="adm.php"><button class="btn btn-sm btn-danger" style="margin-top:-0.3vw;">Administrador</button></a></li>


        <li><a href="sair.php">Sair</a></li>
        <?php }?>
        <?php }?>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


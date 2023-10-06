
<?php

include 'conexao.php';
?>

<nav class="navbar navbar-inverse ">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Blade Enclave</a>
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
            <li><a href="categoria.php?cat=Lanças">Lanças</a></li>
        
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
      <li><a href="carrinho.php">Carrinho</a></li>
        <li><a href="#">Contato</a></li>

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
    <li> <img class="mt-6"style="border-radius:50%; margin-top:0.2vw;" src="Imagens - Usuario/<?php echo $exibeUsuario['imgUsuario'] ?>" alt="Avatar" width="45" height="42" > </li>
    <?php } ?>
    <li><a href="editarUsuario.php?cd='<?php echo $_SESSION['ID'] ?> "><?php echo $exibeUsuario['nmUsuario'] ?></a></li>


    <li><a href="sair.php">Sair</a></li>
        <?php }
         else
          {
        ?>
        <li><a href="adm.php"><button class="btn btn-sm btn-danger">Administrador</button></a></li>


        <li><a href="sair.php">Sair</a></li>
        <?php }?>
        <?php }?>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


<style>
/* Defina o tamanho do carrossel para ocupar toda a largura da tela */
#myCarousel {
  z-index: 900;
    margin-top:-1.2vw;
    width: 100%;
    height: auto; /* Use "auto" para manter a proporção da imagem original */
    max-width: none; /* Remova a largura máxima para ocupar a largura completa */
}
#myCarousel .carousel-inner {
    height: 40vw; /* Defina a altura fixa desejada em pixels */
}
/* Defina o tamanho das imagens dentro do carrossel */
.carousel-inner img {
    width: 100%;
    height: auto; /* Use "auto" para manter a proporção da imagem original */
    object-fit: fill;/* Isso garante que a imagem cubra todo o espaço disponível */
}


</style>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicadores do Carrossel -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Slides do Carrossel -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="Banners/Taiji Banner.png" alt="Primeiro Slide">
    </div>
    <div class="item">
      <img src="Banners/Roma Banner.png" alt="Segundo Slide">
    </div>
    <div class="item">
      <img src="Banners/Claymore Banner.png" alt="Terceiro Slide">
    </div>
  </div>

  <!-- Controles do Carrossel -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Anterior</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Próximo</span>
  </a>
</div>



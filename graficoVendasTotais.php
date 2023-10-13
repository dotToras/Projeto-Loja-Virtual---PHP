<?php
include 'conexao.php';
$consultaVenda = $comando->query(" select * from vwVenda");

$vendaTotais = 0;
while($exibirVenda = $consultaVenda->fetch(PDO::FETCH_ASSOC)){
  $vendaTotais++;
}
?>
<script>
  const ctx = document.getElementById('VendasTotais').getContext('2d');

  new Chart(ctx, {
    type: 'doughnut', // Alterei o tipo para gráfico de rosca (doughnut)
    data: {
      labels: ['Vendas Totais'],
      datasets: [
        {
          data: [<?php echo $vendaTotais?>],
          backgroundColor: ['rgb(54, 162, 235)', 'rgba(255, 99, 132, 0.5)'], // Alterei a cor do segundo setor para ser mais transparente
          hoverOffset: 4,
          borderWidth: 0, 


        },
      ],
    },
   
  });
</script>

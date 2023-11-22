<head>
<link rel="stylesheet" href="estilo.css" />
<link rel="stylesheet" href="checkout.css" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<?php

session_start();


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
?>

<form action="PagamentoController.php" id="PagamentoForm" method="post">
<div class="container mt-5 px-5">

            <div class="mb-4">

                <h2>Confirme a compra e pague</h2>
            <span>por favor, faça o pagamento para desfrutar do produto.</span>
                
            </div>

        <div class="row">

            <div class="col-md-8">
                

                <div class="card p-3">

                    <h6 class="text-uppercase">Detalhes do Pagamento</h6>
                    <div class="inputbox mt-3"> <input type="text" value="<?php echo $exibir['nmUsuario'] ?>" name="name" class="form-control" required="required"> <span>Seu nome</span> </div>


                    <div class="row">

                        <div class="col-md-6">

                            <div class="inputbox mt-3 mr-2"> <input type="text" name="CPF" id="CPF" class="form-control" required="required">  <span>Documento(CPF)</span> 


                            </div>
                            

                        </div>

                     
                        <div class="col-md-6">

                            <div class="inputbox mt-3 mr-2"> <input type="text" value="<?php echo $exibir['dsEmail'] ?>" name="txtemail" class="form-control" required="required">  <span>Email</span> 


                            </div>
                            

                        </div>

                    </div>



                    <div class="mt-4 mb-4">

                        <h6 class="text-uppercase">Endereço de Entrega</h6>


                        <div class="row mt-3">

                            <div class="col-md-6">

                             
                                
                                <div class="inputbox mt-3 mr-2"> <input type="text" name="CEP" id="cep" value="<?php echo $exibir['noCep'] ?>"  class="form-control" required="required"> <span>CEP</span> </div>
                            </div>


                             <div class="col-md-6">

                                <div class="inputbox mt-3 mr-2"> <input type="text" name="txtcidade" value="<?php echo $exibir['dsCidade'] ?>"  class="form-control" required="required"> <span>Cidade</span> </div>
                                

                            </div>


                            

                        </div>


                        <div class="row mt-3">

                            <div class="col-md-6">

                     
    <select name="txtEstado" class="form-control" required="required">
        <option value="">Selecione o Estado</option>
        <option value="Acre">Acre</option>
        <option value="Alagoas">Alagoas</option>
        <option value="Amapá">Amapá</option>
        <option value="Amazonas">Amazonas</option>
        <option value="Bahia">Bahia</option>
        <option value="Ceará">Ceará</option>
        <option value="Distrito Federal">Distrito Federal</option>
        <option value="Espírito Santo">Espírito Santo</option>
        <option value="Goiás">Goiás</option>
        <option value="Maranhão">Maranhão</option>
        <option value="Mato Grosso">Mato Grosso</option>
        <option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
        <option value="Minas Gerais">Minas Gerais</option>
        <option value="Pará">Pará</option>
        <option value="Paraíba">Paraíba</option>
        <option value="Paraná">Paraná</option>
        <option value="Pernambuco">Pernambuco</option>
        <option value="Piauí">Piauí</option>
        <option value="Rio de Janeiro">Rio de Janeiro</option>
        <option value="Rio Grande do Norte">Rio Grande do Norte</option>
        <option value="Rio Grande do Sul">Rio Grande do Sul</option>
        <option value="Rondônia">Rondônia</option>
        <option value="Roraima">Roraima</option>
        <option value="Santa Catarina">Santa Catarina</option>
        <option value="São Paulo">São Paulo</option>
        <option value="Sergipe">Sergipe</option>
        <option value="Tocantins">Tocantins</option>
    </select>

   
 




                                

                            </div>


                  
                            <div class="col-md-6">

                             
                                
<div class="inputbox mt-3 mr-2"> <input type="text" name="txtNumeroCasa" class="form-control" required="required"  class="form-control" required="required"> <span>Número da Casa</span> </div>
</div>
    

                            

                        </div>

                    </div>

                </div>


                <div class="mt-4 mb-4 d-flex justify-content-between">

            

            <button type="submit" class="btn btn-primary px-3">Pague R$ <?php  echo number_format($_SESSION['total'],2,',','.'); ?> </button>

            <a href="carrinho.php" class="btn btn-danger px-3">
        <span>Voltar ao carrinho</span>
    </a>

                        </div>

            </div>

            <div class="col-md-4">

                <div class="card card-blue p-3 text-white mb-3">

                   <span>Você terá que pagar</span>
                    <div class="d-flex flex-row align-items-end mb-3">
                        <h1 class="mb-0 yellow">R$ <?php echo number_format($_SESSION['total'],2,',','.'); ?> </h1>
                    </div>

                    <span>Complete o pagamento</span>
                    

                    <div class="hightlight">

                        <span>Produtos de altissima qualidade e preços excelentes.</span>
                        

                    </div>
                    
                </div>
                
            </div>
            
        </div>
          
        </form>
    <script src="jquery-mask.js"></script>
    <script>
    $(document).ready(function () {
        // Aplicar máscara de CPF
        $('#CPF').mask('000.000.000-00', { reverse: true });

        $('#cep').mask('00000-000');

        // Remover hífen do campo CEP antes de enviar o formulário
        $('#PagamentoForm').submit(function () {
            var cepValue = $('[name="CEP"]').val();
            $('[name="CEP"]').val(cepValue.replace('-', ''));
        });

        $('#PagamentoForm').submit(function () {
    var cpfValue = $('[name="CPF"]').val();
    var cpfsemPontosHifens = cpfValue.replace(/\./g, '').replace('-', '');
    $('[name="CPF"]').val( cpfsemPontosHifens);
});

    });
</script>



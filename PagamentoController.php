<?php 
session_start();


if(empty($_SESSION['ID']))
{
    
    header('location:formlogon.php'); // enviando para formlogon.php
    
}

$nomeCliente = $_POST['name'];
$CPF = $_POST['CPF'];
$email = strtolower($_POST['txtemail']);
$CEP = $_POST['CEP'];
$numeroCasa = $_POST['txtNumeroCasa'];
$valor = doubleval($_SESSION['total']);
$valor = (int)($valor * 100);
$estado = $_POST['txtEstado'];
$cidade = $_POST['txtcidade'];
$resultadoConsulta = consultaCEP($CEP);
$Localidade = $resultadoConsulta['localidade'];
$rua = $resultadoConsulta['logradouro'];
$UF = $resultadoConsulta['uf'];
$Diahoje = date('Y-m-d');
$dataExpiracao = date('Y-m-d', strtotime("+3 days",strtotime($Diahoje))); 

// colocando o token e a url do pagseguro sandbox
define('TOKEN', 'meu token');
define('URL', 'https://sandbox.api.pagseguro.com/charges');
echo "$valor ";
$data['reference_id'] ="ex-00001";
$data['description'] ="Pagamento com boleto - Blade Enclave";
$data['amount'] = [
  "value" => $valor,
  "currency" => "BRL"
];
$data['payment_method'] = 
[
 
    "type" => "BOLETO",
    "boleto"=> [
      "due_date"=> "$dataExpiracao",
      "instruction_lines"=> [
        "line_1"=> "Pagamento processado para DESC Fatura",
        "line_2"=> "Via PagSeguro"
      ],
      "holder"=> [
        "name"=> "$nomeCliente",
        "tax_id"=> "$CPF",
        "email"=> "$email",
        "address"=> [
          "country"=> "Brasil",
          "region"=> "$estado",
          "region_code"=> "$UF",
          "city"=> "$cidade",
          "postal_code"=> "$CEP",
          "street"=> "$rua",
          "number"=> "$numeroCasa",
          "locality"=> "$Localidade"
        ]
      ]
    ]
  

  ];

$data["notification_urls"] = [
   "https://meusite.com/notificacoes"
];
$data = json_encode($data);

$curl = curl_init(URL);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    'Authorization: ' . TOKEN,
    'Content-Type: application/json',
));

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // Set this to true to get the response as a string
$ress = curl_exec($curl);

if ($ress === false) {
    // Handle cURL error
    echo 'Curl error: ' . curl_error($curl);
} else {
    $decodedResponse = json_decode($ress);

    if ($decodedResponse === null && json_last_error() !== JSON_ERROR_NONE) {
        // Handle JSON decoding error
        echo 'JSON decoding error: ' . json_last_error_msg();
    } elseif (is_object($decodedResponse) && property_exists($decodedResponse, 'links') && is_array($decodedResponse->links) && isset($decodedResponse->links[0]->href)) {
        $linkPagamento = $decodedResponse->links[0]->href;
        header("location:finalizarCompra.php?linkPagamento=".$linkPagamento);
    } else {
        echo 'Invalid response or missing links property.';
    }
}

curl_close($curl);

    






function ConsultaCEP($CEP)
{
  

  // definindo a URL com a chamada para verificar dados por CEP
  $urlCEP = "https://viacep.com.br/ws/{$CEP}/json/";

  // iniciando curl
   $curlCEP = curl_init($urlCEP);

   curl_setopt($curlCEP, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($curlCEP, CURLOPT_HTTPGET, true);

   $resCEP = curl_exec($curlCEP);

   return json_decode($resCEP, true);


}
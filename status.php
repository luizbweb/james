<?php
// Acessa a URL desejada e exibe a sua disponibilidade


// URL a se testada
$url = "http://criarteblogs.com.br/blog/wp-content/uploads/2017/08/criarteblogs-logo.png";

// Inicia o CURL

$curl = curl_init();

curl_setopt($curl, CURLOPT_URL, $url);

// curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// Acessa a URL de fato
$out = curl_exec($curl);

// Obtém a resposta HTTP
$response = curl_getinfo($curl, CURLINFO_HTTP_CODE);

// Exibe a resposta
echo $response;




?>
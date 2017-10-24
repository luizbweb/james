<?php
// Acessa a URL desejada e exibe a sua disponibilidade
/*
 * Roadmap:
 *		- Testar multiplos sites por um array
 *		- Testar multiplos sites por arquivo txt
 *		- Enviar resultados por email
 * 		- Rodar automaticamente pelo cron
 *		- Generalizar usando funções ou objetos
 *		- Armazenar lista de sites em banco de dados ou algo mais leve
 */


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

// Exibe a resposta. Implementar teste de diversos códigos HTTP
echo "<h2 style='color:darkcyan;'>".$response." : </h2>";

if ($response == '404') {
	echo "<h2 style='color:darkred;'>O site está fora do ar, Sir...</h2>";
} else {
	echo "<h2 style='color:darkgreen;'>Está tudo bem, Sir...</h2>";
}

?>
<?php
// Acessa a URL desejada e exibe a sua disponibilidade
/*
 * Roadmap:
 *		- Testar multiplos sites por um array - OK
 *		- Testar multiplos sites por arquivo txt - 
 *		- Enviar resultados por email
 * 		- Rodar automaticamente pelo cron
 *		- Generalizar usando funções ou objetos
 *		- Armazenar lista de sites em banco de dados ou algo mais leve
 */

$lines = file("arquivo.txt", FILE_IGNORE_NEW_LINES);
// var_dump($lines);

// Registra os itens do array $lines no array $urls

foreach ($lines as $line) {
	$site = explode("http://", $line);
	
	// Define o array de sites a serem testados. (<Nome do site> => <url de teste>)
	$urls[ $site[0] ] = $site[1];

}

// var_dump($urls);

// Testa cada URL do arrya
foreach($urls as $key => $url){

	// echo $url;

	// Inicia o CURL
	$curl = curl_init();

	curl_setopt($curl, CURLOPT_URL, $url);

	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

	// Acessa a URL de fato
	$out = curl_exec($curl);


	// Obtém a resposta HTTP
	$response = curl_getinfo($curl, CURLINFO_HTTP_CODE);

	// Exibe a resposta. Implementar teste de diversos códigos HTTP (418 - Eu sou um bule de chá). Diferenciar com font-weight.
	if ($response == '404') {
		echo "<h3 style='color:darkred;font-weight:bold;font-family: sans-serif;'>". $response ." : ". $key ." Fora do ar, Sir...</h3>";
	} else {
		echo "<h3 style='color:darkgreen;font-weight:200;font-family: sans-serif;'>". $response ." : ". $key ." Está bem, Sir...</h3>";
	}

	echo "<hr></hr>";

}

?>
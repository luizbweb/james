<?php

// Função para executar o teste de uma única url

function verificaUrl($status, $title, $url) {
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

		echo "<h3 style='color:darkred;font-weight:bold;font-family: sans-serif;'>". $response ." : ". $title ." Fora do ar, Sir...</h3>";
		
		// Armazena o status para enviar por email
		$status[$title] = "<span style='color:darkred;font-weight:bold;font-family: sans-serif;'>".$response ." ". $title ." Fora do ar, Sir...</span>";

	} else {

		echo "<h3 style='color:darkgreen;font-weight:200;font-family: sans-serif;'>". $response ." : ". $title ." Está bem, Sir...</h3>";

		// Armazena o status para enviar por email
		$status[$title] = "<span style='color:darkgreen;font-weight:200;font-family: sans-serif;'>". $response ." ". $title ." Está bem, Sir...</span>";
	}

	return $status;

}

function verificaStatus($title, $url) {
	// Inicia o CURL
	$curl = curl_init();

	curl_setopt($curl, CURLOPT_URL, $url);

	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

	// Acessa a URL de fato
	$out = curl_exec($curl);

	// Obtém a resposta HTTP
	$response = curl_getinfo($curl, CURLINFO_HTTP_CODE);

	return $response;

}

?>

<?php
// Acessa a URL desejada e exibe a sua disponibilidade
/*
 * Roadmap:
 *		- Testar multiplos sites por um array - OK
 *		- Testar multiplos sites por arquivo txt - OK <Nome doe site> <URL>
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
		
		// Armazena o status para enviar por email
		$status[$key] = "<span style='color:darkred;font-weight:bold;font-family: sans-serif;'>".$response ." ". $key ." Fora do ar, Sir...</span>";
	} else {
		echo "<h3 style='color:darkgreen;font-weight:200;font-family: sans-serif;'>". $response ." : ". $key ." Está bem, Sir...</h3>";

		// Armazena o status para enviar por email
		$status[$key] = "<span style='color:darkgreen;font-weight:200;font-family: sans-serif;'>". $response ." ". $key ." Está bem, Sir...</span>";
	}

	echo "<hr></hr>";

}

	
	/*

	$corpo = "";

	foreach ($status as $key => $value) {
		$corpo = $corpo ."". $value ."<br>";
	}

	// echo $corpo;
	
	// Envia o email
  	$email = "luizbweb@gmail.com";
	$emailenviar = "luizbweb@gmail.com";
	$destino = $emailenviar;
	$assunto = "James - REFs Status";

	// É necessário indicar que o formato do e-mail é html
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	$headers .= 'From: $nome <$email>';
	//$headers .= "Bcc: $EmailPadrao\r\n";

	$enviaremail = mail($destino, $assunto, $corpo, $headers);
	
	if($enviaremail){
		$mgm = "E-MAIL ENVIADO COM SUCESSO!";
		// echo " <meta http-equiv='refresh' content='10;URL=status.php'>";
		echo $mgm;
	} else {
		$mgm = "ERRO AO ENVIAR E-MAIL!";
		echo $mgm;
	}*/

?>
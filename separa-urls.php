<?php
// Função que recebe o arquivo.txt e transforma em um array com titulo e url

function separaUrls($file){
	/* 
	 *	Divide o aquivo em linhas
	 *	Cada linha deve conter <Nome do site> <URL de uma imagem>
	 */

	$lines = file($file, FILE_IGNORE_NEW_LINES);

	// Registra os itens do array $lines no array $urls
	foreach ($lines as $line) {
		$site = explode("http://", $line);
		
		// Define o array de sites a serem testados. (<Nome do site> => <url de teste>)
		$urls[ $site[0] ] = $site[1];

	}

	return $urls;	
}

?>
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

	// Apenas o 200 é  suficiente

/*
Lista de códigos de erro:


2xx Sucesso
200 OK
201 Criado
202 Aceito
203 não-autorizado (desde HTTP/1.1)
204 Nenhum conteúdo
205 Reset
206 Conteúdo parcial
207-Status Multi (WebDAV) (RFC 4918)


3xx Redirecionamento
300 Múltipla escolha
301 Movido
302 Encontrado
304 Não modificado
305 Use Proxy (desde HTTP/1.1)
306 Proxy Switch
307 Redirecionamento temporário (desde HTTP/1.1)



Não aceitos:


1xx Informativa
100 Continuar
101 Mudando protocolos
102 Processamento (WebDAV) (RFC 2518)
122 Pedido-URI muito longo


4xx Erro de cliente
400 Requisição inválida
401 Não autorizado
402 Pagamento necessário
403 Proibido
404 Não encontrado
405 Método não permitido
406 Não Aceitável
407 Autenticação de proxy necessária
408 Tempo de requisição esgotou (Timeout)
	409 Conflito
	410 Gone
	411 comprimento necessário
	412 Pré-condição falhou
	413 Entidade de solicitação muito grande
	414 Pedido-URI Too Long
	415 Tipo de mídia não suportado
	416 Solicitada de Faixa Não Satisfatória
	417 Falha na expectativa
	418 Eu sou um bule de chá
	422 Entidade improcessável (WebDAV) (RFC 4918)
	423 Fechado (WebDAV) (RFC 4918)
	424 Falha de Dependência (WebDAV) (RFC 4918)
	425 coleção não ordenada (RFC 3648)
	426 Upgrade Obrigatório (RFC 2817)
	450 bloqueados pelo Controle de Pais do Windows
	499 cliente fechou Pedido (utilizado em ERPs/VPSA)


5xx outros erros
500 Erro interno do servidor (Internal Server Error)
501 Não implementado (Not implemented)
502 Bad Gateway
503 Serviço indisponível (Service Unavailable)
504 Gateway Time-Out
505 HTTP Version not supported


Para descobrir a versão do wordpress:

Busque essa parte do <head>
<link rel="stylesheet" href="http://vitalliimoveis.com/wp-admin/load-styles.php?c=0&amp;dir=ltr&amp;load%5B%5D=dashicons,buttons,forms,l10n,login&amp;ver=4.9.1" type="text/css" media="all">


*/

	if ($response != '200') {

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

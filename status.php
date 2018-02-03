<?php 

include('verifica-url.php');
include('separa-urls.php');
include('envia-email.php');


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>James, o mordomo</title>
</head>
<body>
<?php
// Acessa a URL desejada e exibe a sua disponibilidade
/*
 * Roadmap:
 *		- Testar multiplos sites por um array - OK
 *		- Testar multiplos sites por arquivo txt - OK <Nome doe site> <URL>
 *		- Enviar resultados por email - OK
 * 		- Rodar automaticamente pelo cron - OK
 *		- Generalizar usando funções ou objetos
 			| Função que recebe o nome do aruivo e retorna array com os sites e urls.
			| Função que recebe a nome e url, executa o teste e retorna a response e o status.
			| Função que recebe o status, envia email e retorna o status do envio.
 *		- Armazenar lista de sites em banco de dados ou algo mais leve (fique com arquivo de texto mesmo...)
 *		Comando no cron: php -q /home/refst210/public_html/homolog/james/status.php
 *		Será executado
 		Briarte Blogs http://criarteblogs.com.br/blog/wp-content/uploads/2017/08/criarteblog-logo.png
 */

// Separa nomes e URLs
$urls = separaUrls("arquivo.txt");

$status[] = '';

// Testa cada URL do array
foreach($urls as $key => $url){

	$status = verificaUrl($status, $key, $url);
	echo "<hr></hr>";

}

// Verifica se existe algum site fora do ar para enviar o email.
foreach($urls as $key => $url){

	$offline = false;
	$is_offline = verificaStatus($key, $url);
	if ($is_offline != '200') {
		$offline = true;
		break;
	}
}

// var_dump($status);

if ($offline) {
	$result = enviarEmail($status,"luizbweb@gmail.com","luizbweb@gmail.com");
	echo $result;
}


/*
*/
?>
</body>
</html>
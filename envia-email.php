<?php

// Função que recebe o status, envia email caso haja problemas e retorna o resultado do envio.
function enviarEmail($status, $remetente, $destinatario) {
	
	$corpo = "";

	foreach ($status as $key => $value) {
		$corpo = $corpo ." ". $value ."<br>";
	}

	// echo $corpo;
	
	// Envia o email
  	$email = $remetente;
	$emailenviar = $destinatario;
	$destino = $emailenviar;
	$assunto = "James - REFs Status";

	// É necessário indicar que o formato do e-mail é html
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	$headers .= 'From: <'. $email. '>';
	//$headers .= "Bcc: $EmailPadrao\r\n";

	$enviaremail = mail($destino, $assunto, $corpo, $headers);
	
	if($enviaremail){
		$mgm = "E-MAIL ENVIADO COM SUCESSO!";
		// echo " <meta http-equiv='refresh' content='10;URL=status.php'>";
	} else {
		$mgm = "ERRO AO ENVIAR E-MAIL!";
	}

	return $mgm;
}

?>
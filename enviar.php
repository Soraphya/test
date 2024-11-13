<?php
ob_start();

// Passando os dados obtidos pelo formulário para as variáveis abaixo
$emaildestinatario = 'contato@soraphya.com'; // Digite seu e-mail aqui, lembrando que o e-mail deve estar em seu servidor web  
$nome_c = $_POST["nome"];
$email_c = $_POST["email"];
$msg_c = $_POST["mensagem"];
 
/* Montando a mensagem a ser enviada no corpo do e-mail. */
$mensagemHTML = '<P>FORMULARIO PREENCHIDO NO SITE </P>
<p><b>Nome:</b> '.$nome_c.'
<p><b>E-mail:</b> '.$email_c.'
<p><b>Mensagem:</b> '.$msg_c.'</p>
<hr>';


// O remetente deve ser um e-mail do seu domínio conforme determina a RFC 822.
// O return-path deve ser ser o mesmo e-mail do remetente.
$headers = "MIME-Version: 1.1\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n";
$headers .= "From: Lead Site\r\n"; // remetente
$headers .= "Return-Path: contato@soraphya.com\r\n"; // return-path
$envio = mail("contato@soraphya.com", "Lead Site", $mensagemHTML, $headers); // Digite seu e-mail aqui, lembrando que o e-mail deve estar em seu servidor web
 
 if($envio)
	echo "<script>alert('Email enviado com sucesso!');</script>"; // Página que será redirecionada
	header("Location: index.html");
	exit;
?>

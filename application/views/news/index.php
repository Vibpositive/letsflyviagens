
<?php

$emaildestinatario = "ras.vibpositive@gmail.com";
$emailsender = "william@letsflyviagens.com.br";
$assunto = "Teste";
$mensagemHTML = "Mensagem";
$quebra_linha = "<br>";
$headers = "MIME-Version: 1.1\r\n";
$headers .= "Content-type: text/plain; charset=UTF-8\r\n";
$headers .= "From: eu@seudominio.com\r\n"; // remetente
$headers .= "Return-Path: eu@seudominio.com\r\n"; // return-path

if(!mail($emaildestinatario, $assunto, $mensagemHTML, $headers ,"-r".$emailsender)){ // Se for Postfix
    $headers .= "Return-Path: " . $emailsender . $quebra_linha; // Se "não for Postfix"
    mail($emaildestinatario, $assunto, $mensagemHTML, $headers );
}

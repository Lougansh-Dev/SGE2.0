<?php
require_once('chat-conexao.php');

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_STRING);

if($nome == '' || $mensagem == ''){
	return false;
}else{
	
	$sql = $pdo->prepare('INSERT INTO tbchat (nome, mensagem) VALUES (:nameParam, :msgParam)');

	$nome = htmlspecialchars($nome);
	$mensagem = htmlspecialchars($mensagem);

	$sql->bindParam(':nameParam', $nome);
	$sql->bindParam(':msgParam', $mensagem);
	$sql->execute();
}

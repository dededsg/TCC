<?php
require_once('conexao.php');
session_start();
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_STRING);
$id_postagem = filter_input(INPUT_POST, 'idPost', FILTER_SANITIZE_STRING);



setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
$data1 = date('d-m-Y');


if($nome == '' || $mensagem == ''){
	
	return false;
}else{
	
	$sql = $pdo->prepare('INSERT INTO chat (escreve, texto, id_postagem, data1) VALUES (:nameParam, :msgParam, :idParam, :dataParam)');

	$id_postagem = htmlspecialchars($id_postagem);
	$nome = htmlspecialchars($nome);
	$mensagem = htmlspecialchars($mensagem);
	
	$sql->bindParam(':idParam', $id_postagem);
	$sql->bindParam(':dataParam', $data1);
	$sql->bindParam(':nameParam', $nome);
	$sql->bindParam(':msgParam', $mensagem);
	$sql->execute();
}



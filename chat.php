<?php
/*
#####################################
Código responsável por receber as
mensagens que chegam do banco de dados
e renderizalas em tela
#####################################
*/
include("conexao.php");
session_start();
$idUser = $_SESSION['id'];
$idPostagem = $_GET['id'];
$sql = $pdo->query("SELECT * FROM chat");

  foreach ($sql->fetchAll() as $key) {
	if($key['id_postagem'] == $idPostagem){

		if($key['escreve'] == $idUser){
			$sql = "SELECT * FROM cadastro WHERE id = '$idUser'";
			$resultado = mysqli_query($conn, $sql) or die("Erro ao retornar dados");
			$reg = mysqli_fetch_array($resultado);
			echo "<div class='row'>";
			echo "<div class='col-sm-2'><p class='nome1 text-center'>".$reg['nome']."</p></div>";
			echo "<div class='col-sm-10'><p class='textomensagem'>".$key['texto']."</p></div>";
			echo "</div>";
		}else{
			$idUser2 = $key['escreve'];
			$sql = "SELECT * FROM cadastro WHERE id = '$idUser2'";
			$resultado = mysqli_query($conn, $sql) or die("Erro ao retornar dados");
			$reg = mysqli_fetch_array($resultado);
			echo "<div class='row'>";
			echo "<div class='col-sm-10'><p class='textomensagem'>".$key['texto']."</p></div>";
			echo "<div class='col-sm-2'><p class='nome2 text-center'>".$reg['nome']."</p></div>";
			echo "</div>";
		}
	}
		

	}

?>
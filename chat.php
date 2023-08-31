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

$sqlA = "SELECT * FROM postagem WHERE id_postagem = $idPostagem";
$resA = mysqli_query($conn, $sqlA);
$linha = mysqli_fetch_array($resA);

if($linha['id_cadastroDev'] == $idUser){
if($linha['statu'] == 1) {
	header('location: homeDev.php');
}
}
if($linha['id_cadastro'] == $idUser){
	if($linha['statu'] == 1) {
		header('location: home.php');
	}
	}
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
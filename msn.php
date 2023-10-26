<?php
include_once('conexao.php');    

 if(isset($_POST['submit']) && isset($_POST['texto'])){

    $texto = $_POST['texto'];
    $id = $_POST['id'];
    $idP = $_POST['idP'];

    $sql = "INSERT INTO chat (id_postagem, escreve, texto) VALUES ('$idP', '$id', '$texto')";
    mysqli_query($conn, $sql);

    header('location: verificaAceito.php?id=' . $idP);
 }
?>
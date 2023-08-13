<?php
$dns = "mysql:dbname=tcc;host=localhost"; 
$user = "root";
$pass = "";
$pdo = new PDO($dns, $user, $pass);        

$conn = mysqli_connect('localhost', 'root', '', 'tcc');
if(mysqli_connect_errno()) {
    echo "Erro na conexão com o banco de dados";
    exit();
}

?>
<?php
    session_start();
    //print_r($_SESSION);
    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        unset($_SESSION['id']);
        header('location: login.php');
    }
    $logado = $_SESSION['email'];

    include_once('conexao.php');    

    $sql = "SELECT * FROM cadastro WHERE email = '$logado'";

    $resultado = mysqli_query($conn, $sql) or die("Erro ao retornar dados");
    
    $registro = mysqli_fetch_array($resultado);

$id_cadastro = $_SESSION['id'];
$id = $_POST['id'];




if(isset($_POST['submit'])){
    if(isset($_POST['submit']) && isset($_FILES['arquivo']) && $_FILES['arquivo']['error'] === UPLOAD_ERR_OK){

        $formatosPermitidos = array("pdf");
        $extensao = pathinfo($_FILES['arquivo']['name'],PATHINFO_EXTENSION);
            
                if(in_array($extensao, $formatosPermitidos)){
                    $pasta = "resultado/";
                    $temporario = $_FILES['arquivo']['tmp_name'];
                    $novoNome = uniqid().".$extensao";             

                    $nomearquivo = $novoNome;
                    $nomearquivo1 = "resultado/";
                    $nomearquivo1 .= $nomearquivo;

                    $id = $_POST['id'];
                    
                    $num = 1;
                    $sqlUpdate = "UPDATE postagem SET result='$nomearquivo', statu='$num' WHERE id_postagem=$id";

                    mysqli_query($conn, $sqlUpdate);
                    if(mysqli_affected_rows($conn) > 0) {
                        echo '<script type="text/javascript">';
                        echo 'alert("Trabalho concluído!");'; 
                        echo 'window.location.href = "homeDev.php";';
                        echo '</script>';
            
                    }else{
                        
                        echo '<script type="text/javascript">'; 
                        echo 'alert("Não foi possível fazer o upload!");'; 
                        echo 'window.location.href = "homeDev.php";';
                        echo '</script>';
                    }
                }else{  
                    echo '<script type="text/javascript">'; 
                    echo 'alert("Formato de arquivo incompatível. Apenas PDF!");'; 
                    echo 'window.location.href = "homeDev.php";';
                    echo '</script>';
                }
            }else{
                echo '<script type="text/javascript">'; 
                    echo 'alert("Informe o arquivo!");'; 
                    echo 'window.location.href = "homeDev.php";';
                    echo '</script>';
              
            }            
        }elseif(isset($_POST['excluir'])) {
                $status = 2;
                $idUser = $_SESSION['id'];
                $id = $_POST['id'];
                
            
                $sqlCancela = "UPDATE postagem SET statu = '$status' WHERE id_postagem = $id";
                mysqli_query($conn, $sqlCancela);
            
                $sql = "SELECT * FROM postagem WHERE id_postagem = $id";
                $res = mysqli_query($conn, $sql);
                $linha = mysqli_fetch_array($res);
            
                if (mysqli_affected_rows($conn) > 0) {
                  if ($linha['statu'] == 2) {
            
                    echo '<script type="text/javascript">';
                    echo 'alert("Cancelado com sucesso!");';
                    echo 'window.location.href = "homeDev.php";';
                    echo '</script>';
                  } else {
            
                    echo '<script type="text/javascript">';
                    echo 'alert("!!!ERRO!!!");';
                    echo 'window.location.href = "homeDev.php";';
                    echo '</script>';
                  }
                }
                echo '<script type="text/javascript">';
                    echo 'alert("!!!ERRO!!!");';
                    echo 'window.location.href = "homeDev.php";';
                    echo '</script>';
              }else{
           
                echo '<script type="text/javascript">'; 
                echo 'alert("Informe o arquivo!");'; 
                echo 'window.location.href = "homeDev.php";';
                echo '</script>';
            }
?>
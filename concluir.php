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
                        echo 'alert("Postagem feita com secesso :)");'; 
                        echo 'window.location.href = "homeDev.php";';
                        echo '</script>';
            
                    }else{
                        mysqli_close($conn);
                    }

                    if(move_uploaded_file($temporario, $pasta. $novoNome)){
                        echo '<script type="text/javascript">'; 
                        echo 'alert("Upload feito com secesso :)");'; 
                        echo 'window.location.href = "chatAceito.php";';
                        echo '</script>';
                        
                    }else{
                        echo '<script type="text/javascript">'; 
                        echo 'alert("Não foi possivel fazer o upload!!");'; 
                        echo 'window.location.href = "chatAceito.php";';
                        echo '</script>';
                    }
                }else{  
                    echo '<script type="text/javascript">'; 
                    echo 'alert("Formato de arquivo incompativél!!");'; 
                    echo 'window.location.href = "chatAceito.php";';
                    echo '</script>';
                }
            }else{
                echo '<script type="text/javascript">'; 
                    echo 'alert("Informe o arquivo!!");'; 
                    echo 'window.location.href = "homeDev.php";';
                    echo '</script>';
              
            }            
        }else{
           
                echo '<script type="text/javascript">'; 
                echo 'alert("Informe o campo de arquivo!!2");'; 
                echo 'window.location.href = "chatAceito.php";';
                echo '</script>';
            }

?> 


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



echo "abacate";
$id_cadastro = $_SESSION['id'];
echo $id_cadastro;



if(isset($_POST['submit']) && !empty($_POST['materia'])){
    if(isset($_POST['submit']) && !empty($_POST['desc'])){
        if(isset($_POST['submit']) && !empty($_POST['prazo'])){
            if(isset($_POST['submit']) && isset($_FILES['arquivo']) && $_FILES['arquivo']['error'] === UPLOAD_ERR_OK){

                $formatosPermitidos = array("pdf");

                $extensao = pathinfo($_FILES['arquivo']['name'],PATHINFO_EXTENSION);
            
                if(in_array($extensao, $formatosPermitidos)){
                    $pasta = "arquivos/";
                    $temporario = $_FILES['arquivo']['tmp_name'];
                    $novoNome = uniqid().".$extensao";
                    
                    $materia = $_POST['materia'];
                    $descricao = $_POST['desc'];
                    $prazo = $_POST['prazo'];
                   

                    $prazoF = date('d-m-Y', strtotime($prazo));

                    $nomearquivo = $novoNome;
                    $nomearquivo1 = "arquivos/";
                    $nomearquivo1 .= $nomearquivo;
                    
                    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                    $data = date('d-m-Y');

                    $sql = "INSERT INTO postagem (nomearquivo, descricao, materia, prazo, datapost, id_cadastro) 
                                        VALUES ('$nomearquivo', '$descricao', '$materia', '$prazoF', '$data', '$id_cadastro')";

                    mysqli_query($conn, $sql);
                    if(mysqli_affected_rows($conn) > 0) {
                        echo '<script type="text/javascript">'; 
                        echo 'alert("Postagem feita com secesso :)");'; 
                        echo 'window.location.href = "home.php";';
                        echo '</script>';
            
                    }else{
                        mysqli_close($conn);
                    }

                    if(move_uploaded_file($temporario, $pasta. $novoNome)){
                        echo '<script type="text/javascript">'; 
                        echo 'alert("Upload feito com secesso :)");'; 
                        echo 'window.location.href = "postagem.php";';
                        echo '</script>';
                        
                    }else{
                        echo '<script type="text/javascript">'; 
                        echo 'alert("Não foi possivel fazer o upload!!");'; 
                        echo 'window.location.href = "postagem.php";';
                        echo '</script>';
                    }
                }else{  
                    echo '<script type="text/javascript">'; 
                    echo 'alert("Formato de arquivo incompativél!!");'; 
                    echo 'window.location.href = "postagem.php";';
                    echo '</script>';
                }
            }else{
                echo '<script type="text/javascript">'; 
                echo 'alert("Informe o campo de arquivo!!");'; 
                echo 'window.location.href = "postagem.php";';
                echo '</script>';
            }
        }else{
            echo '<script type="text/javascript">'; 
            echo 'alert("Informe o campo de prazo!!");'; 
            echo 'window.location.href = "postagem.php";';
            echo '</script>';  
        }
    }else{
        echo '<script type="text/javascript">'; 
        echo 'alert("Informe o campo de descrição!!");'; 
        echo 'window.location.href = "postagem.php";';
        echo '</script>';
    }
}else{
    echo '<script type="text/javascript">'; 
    echo 'alert("informe o campo de matéria!!");'; 
    echo 'window.location.href = "postagem.php";';
    echo '</script>';
}
?> 
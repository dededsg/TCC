<?php
    session_start();
    //print_r($_SESSION);
    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('location: login.php');
    }
    $logado = $_SESSION['email'];

    include_once('conexao.php');    

    $sql = "SELECT * FROM cadastro WHERE email = '$logado'";

    $resultado = mysqli_query($conn, $sql) or die("Erro ao retornar dados");
    
    $registro = mysqli_fetch_array($resultado)

?>
<?php

include_once('conexao.php');

if(isset($_POST['submit']) && !empty($_POST['materia'])){
    if(isset($_POST['submit']) && !empty($_POST['desc'])){
        if(isset($_POST['submit']) && isset($_FILES['arquivo']) && $_FILES['arquivo']['error'] === UPLOAD_ERR_OK){

            $formatosPermitidos = array("pdf");

            $extensao = pathinfo($_FILES['arquivo']['name'],PATHINFO_EXTENSION);
        
            if(in_array($extensao, $formatosPermitidos)){
                $pasta = "arquivos/";
                $temporario = $_FILES['arquivo']['tmp_name'];
                $novoNome = uniqid().".$extensao";
                
                $materia = $_POST['materia'];
                $descricao = $_POST['desc'];
                $nomearquivo = $novoNome;
                $nomearquivo1 = "arquivos/";
                $nomearquivo1 .= $nomearquivo; 

                $sql = "INSERT INTO postagem (nomearquivo, descricao, materia) VALUES ('$nomearquivo', '$descricao', '$materia')";

                mysqli_query($conn, $sql);
                if(mysqli_affected_rows($conn) > 0) {
                    echo '<script type="text/javascript">'; 
                    echo 'alert("Postagem feita com secesso :)");'; 
                    echo 'window.location.href = "postagem.php";';
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <img src="<?php echo $nomearquivo1; ?>" alt="Descrição da Imagem">
</body>
</html>

    






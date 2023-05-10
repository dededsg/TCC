<?php
include_once('conexao.php');

if(isset($_POST['submit']) && !empty($_POST['materia'])){
    if(isset($_POST['submit']) && !empty($_POST['desc'])){
        if(isset($_POST['submit']) && isset($_FILES['arquivo']) && $_FILES['arquivo']['error'] === UPLOAD_ERR_OK){

            $formatosPermitidos = array("pdf", "jpg", "png");

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
                    echo 'alert("Cadastro concluido com sucesso!");'; 
                    echo '</script>';
        
                }else{
                    mysqli_close($conn);
                }

                if(move_uploaded_file($temporario, $pasta. $novoNome)){
                    echo $mensagem = "Upload feito com sucesso!";
                    echo $nomearquivo1;
                    
                }else{
                    echo $mensagem = "Erro, não foi possivel fazer o upload";
                }
            }else{  
                echo "ERRO, formato de arquivo inválido!!!";
            }
        }else{
            echo "ERRO, informe o campo de arquivo!!!";
        }
    }else{
        echo "ERRO, informe o campo de descrição!!!";
    }
}else{
    echo "ERRO, informe o campo de matéria!!!";
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

    






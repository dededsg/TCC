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

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">

    <title>SlideIt</title>
    <link rel="shortcut icon" href="icon/icon.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="CSS.css">
    <style>
    </style>
</head>

<body style="background: linear-gradient(0,  #010118, #040437, #010118);">

    <?php

if(isset($_POST['but']) && !empty($_POST['proposta'])){

    $id_dev = $_SESSION['id'];
    $proposta = $_POST['proposta'];
    $id_postagem = $_POST['postagem'];

    echo $id_postagem;

    $sql = "INSERT INTO propostas (proposta, id_postagem, id_dev) VALUES ('$proposta', '$id_postagem', '$id_dev')";
    mysqli_query($conn, $sql);
    echo '<script type="text/javascript">'; 
    echo 'alert("Proposta enviada com sucesso!");'; 
    echo 'window.location.href = "homeDev.php";';
    echo '</script>';


}
?>
    <div class="container">
    <div class="row">
            <div class="col-sm-6">
                <a href="index.php" class="logo1 mt-3">SlideIt</a>
            </div>
            <div class="col-sm-6 d-flex flex-row-reverse" >
                <a href="voltar.php?id=homeDev" class="btn btn-lg btn-outline-danger mt-3" style="height: 60%;" id="nome5">Voltar</a>
            </div>
        </div>
        <div class="row mt-5  align-items-center" style="justify-content: space-around;">
            <!---------------------------------------------------------------------------------------------------------------------------------------------->
            <div class="col-md-10 mx-flex col-lg-5">


                <?php 
                $id = $_GET['id'];
                

                include('conexao.php');

                $sql = "SELECT * FROM postagem";
                $res = mysqli_query($conn, $sql);

                while ($linha = mysqli_fetch_array($res)){

                if(($linha['id_postagem']) == ($id)){ 
                    $idPostagem = $linha['id_postagem'];
                ?>
                <div style="color: white;">
                <h3> <?php echo $linha['materia']; ?> </h3>
                <a>Descrição:</a>
                <a> <?php echo $linha['descricao']; ?> </a>
                
                <p class="mt-2"><a href="<?php echo 'arquivos/' . $linha['nomearquivo'];?>"
                    download="<?php echo 'Slideit_' . $linha['materia'];?>.pdf">Baixe o pdf! </a>
                </p>
                </div>

                <?php }}?>



                <form action="verificaPost.php" method="POST" enctype="multipart/form-data"
                    class="mb-5 p-4 p-md-5 boder rounded-5 border border-primary" style="background-color: #ffffff00;">
                    <input type="hidden" name="postagem" value="<?php echo $idPostagem; ?>">
                    <div class="card-content mt-3 mb-5">
                        <h1 class="titulo-index">
                            Enviar uma proposta
                        </h1>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" name="proposta" placeholder="Descrição ..."
                            id="floatingTextarea2" style="height: 100px" required></textarea>
                        <label for="floatingTextarea2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-card-text" viewBox="0 0 16 16">
                                <path
                                    d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                                <path
                                    d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z" />
                            </svg>
                            Descrição ...
                        </label>
                    </div>
                    <div class="form-floating mt-5 mb-5">
                        <button class="btn btn-lg btn-outline-primary w-100" type="submit" style="color: white;"
                            name="but">
                            Enviar
                        </button>
                    </div>
                </form>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
                crossorigin="anonymous">
            </script>

</body>

</html>
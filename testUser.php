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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <title>SlideIt</title>
    <link rel="shortcut icon" href="icon/icon.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="CSS.css">
</head>

<body style="background: linear-gradient(0,  #010118, #040437, #010118);">
    <div class="container">
        <div class="row mb-5">
            <a href="index.php" class="logo1 mt-3">SlideIt</a>
        </div>
        <div class="row mt-5  align-items-center">

            <div class="col-md-10 mt-5 mx-auto col-lg-5">
                <form action="testUserBack.php" method="POST"
                    class="mb-5 p-4 p-md-5 boder rounded-5 border border-primary" style="background-color: #ffffff00;">
                    <div class="card-content mt-5 mb-5">
                        <h1 class="titulo-index">
                            Você deseja:
                        </h1>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="escolha" id="flexRadioDefault1" value="2"
                            checked>
                        <label class="form-check-label" for="flexRadioDefault1" style="color: white;"> Desenvolvedor os
                            slides </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="escolha" id="flexRadioDefault2" value="1">
                        <label class="form-check-label" for="flexRadioDefault2" style="color: white;"> Pedir os slides
                        </label>
                    </div>
                    <div class="form-floating mt-5 mb-5">
                        <button class="btn btn-lg btn-outline-primary w-100" type="submit" style="color: white;"
                            name="submit"> Enviar </button>
                    </div>
                    <div class="form-floating mb-4 ml-3">
                        <a href="login.php" class="" id="link">Fazer o login</a>
                    </div>
                </form>
            </div>

        </div>
    </div>
</body>

</html>
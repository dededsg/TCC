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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
        <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
        <title>Cadastro de Usuário</title>
        <link rel="stylesheet" type="text/css" href="CSS.css">
        <style>
            input[type="file"] {
                display: none;
            }
        </style>
    </head>
    <body>
        <div class="row">
        <nav class="navbar navbar-expand-sm">
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="col-sm-6">
            <a href="home.php" class="logo">SlideIt4Me</a>
            </div>

            <div class="col-sm-auto" style="margin-left: 370px;">
                <a><?php echo $registro['nome']." ";echo $registro['sobrenome'];?></a>
            </div>

            <div class="col-sm-auto">
                <lord-icon
                    src="https://cdn.lordicon.com/dxjqoygy.json"
                    trigger="hover"
                    colors="primary:#121331,secondary:#000000"
                    style="width:40px; height:40px; margin-left: 10px; margin-right: 10px;">
                </lord-icon>
            </div>

            <div class="col-sm-" style="margin-right: 40px; margin-left: 40px;">
                <a href="sair.php" class="btn btn-danger" id="nome5">Sair</a>
            </div>
        </nav>
        </div>

        <div class="container" style="padding-right: 280px;">       
            <main style="margin-left: 30%;">
                <div style="margin-top: 20px;">

                    <form action="testUserBack.php" method="POST">
                        <div class="cadastro" style="padding-left: 105px; padding-right: 105px;">
                        <h1 class="titulo-index">
                            Você deseja :
                        </h1>   

                        <div class="card-content">
                            <div class="card-content-file">

                                <input type="radio" id="opcao1" name="escolha" value="2">
                                <label for="opcao1">Desenvolvedor os slides</label><br>

                                <input type="radio" id="opcao2" name="escolha" value="1">
                                <label for="opcao2">Pedir os slides</label><br>

                            </div>

                            <div class="row" style="margin-top: 20px;">
                                <div class="col-sm-12 mx-auto">
                                    <input class="col-sm-12 inputSubmit btn btn-primary" type="submit" name="submit" value="Enviar" style=" margin-top: 50px; border-radius: 30px;">
                                </div>
                            </div>
                        </div> 
                    </form> 
                </div>
            </main>
        </div>
    </body>
</html>


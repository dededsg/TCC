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
        <title>perfil</title>
        <link rel="stylesheet" type="text/css" href="CSS.css">
    </head>
    <body>
        <div class="row">
            <nav class="navbar navbar-expand-sm navbar-light bg-light border-bottom border-gray">
                <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="col-sm-2">
                    <!-- adicionei margin left para mover a logo para direita e
                    margin right para ficar bom no mobile -->
                    <a href="index.php" class="logo">SlideIt4Me</a>
                </div>
                <!-- Adicionei um novo bloco para o menu, ele aparece apenas para telas tablet, pc
                assim puder deixa-lo centralizado sem cagar quando for pro mobile -->
                <div class="col-sm-2 d-sm-block d-none">
                    <ul class="navbar-nav justify-content-center">
                        <li class="nav-item"><a class="nav-link" href="sobre.php"> Sobre nós </a></li>
                        <li class="nav-item"><a class="nav-link" href=" poliuso.php "> Política de uso </a></li>
                        <li class="nav-item"><a class="nav-link" href=" contato.php "> Contato </a></li>
                    </ul>
                </div>
                <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
                    <!-- aparece só para mobile -->
                <ul class="navbar-nav col-sm-6 d-sm-none d-block"> 
                    <li class="nav-item"><a class="nav-link" href="sobre.php"> Sobre nós </a></li>
                    <li class="nav-item"><a class="nav-link" href=" poliuso.php "> Política de uso </a></li>
                    <li class="nav-item"><a class="nav-link" href=" contato.php "> Contato </a></li>
                </ul>

                <div class="col-sm-auto">
                    <a><?php echo $registro['nome']." ";echo $registro['sobrenome'];?></a>
                </div>

                <div class="col-sm-auto">
                <a href="perfil.php"><img src="icone user.png" alt="logo" style="width: 65px; margin: 0 2rem 0 2rem" value="Usuário" /></a>
                </div>

                <div class="col-sm-auto" style="margin-right: 2rem">
                    <a href="sair.php" class="btn btn-danger" id="nome5">Sair</a>
                </div>
                </div>
            </nav>
        </div>

        <div class="container">
            <div class="row">
                <div class="mx-auto col-sm-6" style="text-align: center; margin-top: 50px;">
                    <h1>Perfil</h1>
                </div>
            </div>
            <div class="row">
                <div class="table-responsive-sm col-sm-6 mx-auto" style="margin-top: 50px;">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                            <th scope="row">Nome</th>
                            <td><?php echo $registro['nome'];?></td>
                            </tr>
                            <tr>
                            <th scope="row">Sobrenome</th>
                            <td><?php echo $registro['sobrenome'];?></td>
                            </tr>
                            <tr>
                            <th scope="row">Email</th>
                            <td><?php echo $logado;?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>


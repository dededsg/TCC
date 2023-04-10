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
    </head>
    <body>
    <div class="row">
      <nav class="navbar navbar-expand-sm">
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarContent">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="col-sm-6">
          <a href="index.php" class="logo">SlideIt4Me</a>
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
     
        <div class="container">
            <div class="row">
                <div class="mx-auto col-sm-6" style="text-align: center; margin-top: 50px;">
                    <h1></h1>
                </div>
                
                <div class="row"> 
                    <div class="mx-auto col-sm-6" style="text-align: center; margin-top: 20px;">
                        
                    </div> 
                </div> 

                <div class="row" style="margin-top: 20px;">
                    <div class="col-sm-6 mx-auto">
                        <a href="postagem.php" class="inputSubmit btn btn-primary">Fazer postagem</a>
                    </div>
                </div>   
            </div>
        </div>
        
    </body>
</html>
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
     
        <div class="container">
            <div class="table-sm" style="margin-top: 20px">
                <?php 
                $id = $_GET['id'];

                include('conexao.php');

                $sql = "SELECT * FROM postagem";
                $res = mysqli_query($conn, $sql);
                while ($linha = mysqli_fetch_array($res)){
                if(($linha['id_postagem']) == ($id)){ ?> 

                    <p> <?php echo $linha['materia'] ?> </p>
                    <a> <?php echo $linha['datapost'] ?> </a>
                    <a id="prazo"> <?php echo $linha['prazo'] ?> </a>
                    <p> <?php echo $linha['descricao'] ?> </p>
                    <p><?php echo 'arquivo/' . $linha['nomearquivo'] ?></p>
                    <a href="<?php echo 'arquivos/' . $linha['nomearquivo']?>"download="<?php echo 'Slideit_' . $linha['materia']?>.pdf">Baixe o pdf! </a>

                 <?php }}?>        
                   
            </div> 
        </div>   
    </body>
</html>
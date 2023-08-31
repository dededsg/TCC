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
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" type="text/css" href="CSS.css" />
  </head>
  <body>
    <div class="row">
      <nav class="navbar navbar-expand-sm">
        <button
          class="navbar-toggler"
          data-bs-toggle="collapse"
          data-bs-target="#navbarContent"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="col-sm-6">
          <a href="home.php" class="logo">SlideIt4Me</a>
        </div>

        <div class="col-sm-auto" style="margin-left: 370px">
          <a><?php echo $registro['nome']." ";echo $registro['sobrenome'];?></a>
        </div>

        <div class="col-sm-auto">
          <lord-icon
            src="https://cdn.lordicon.com/dxjqoygy.json"
            trigger="hover"
            colors="primary:#121331,secondary:#000000"
            style="
              width: 40px;
              height: 40px;
              margin-left: 10px;
              margin-right: 10px;
            "
          >
          </lord-icon>
        </div>

        <div class="col-sm-" style="margin-right: 40px; margin-left: 40px">
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

                if(($linha['id_postagem']) == ($id)){
        ?>

        <p><?php echo $linha['materia'] ?></p>
        <a> <?php echo $linha['datapost'] ?> </a>
        <a id="prazo"> <?php echo $linha['prazo'] ?> </a>
        <p><?php echo $linha['descricao'] ?></p>
        <p>
        <a href="<?php echo 'arquivos/' . $linha['nomearquivo']?>"
          download="<?php echo 'Slideit_Apoio' . $linha['materia']?>.pdf">
          Baixe o pdf!
        </a>
        </p>
        <p>
        <a href="<?php echo 'resultado/' . $linha['result']?>"
          download="<?php echo 'Slideit_' . $linha['materia']?>.pdf">
          Baixe o slide!
        </a>
                </p>
        <?php
            }
          };
          $id = $_GET['id'];
          $idU = $_SESSION['id'];
                include('conexao.php');
                $sqlC = "SELECT * FROM chat WHERE id_postagem = $id";
                $resC = mysqli_query($conn, $sqlC);
                
                while ($linhaC = mysqli_fetch_array($resC)){
                    
                if(($linhaC['escreve']) == ($idU)){
                    
                    $sql = "SELECT * FROM cadastro WHERE id = '$idU'";
                    $resultado = mysqli_query($conn, $sql) or die("Erro ao retornar dados");
                    $reg = mysqli_fetch_array($resultado);
                    echo "<div class='row'>";
                    echo "<div class='col-sm-2'><p class='nome1 text-center'>".$reg['nome']."</p></div>";
                    echo "<div class='col-sm-10'><p class='textomensagem'>".$linhaC['texto']."</p></div>";
                    echo "</div>";
                    
                }else{

                    $idUser2 = $linhaC['escreve'];
                    $sql = "SELECT * FROM cadastro WHERE id = '$idUser2'";
                    $resultado = mysqli_query($conn, $sql) or die("Erro ao retornar dados");
                    $reg = mysqli_fetch_array($resultado);
                    echo "<div class='row'>";
                    echo "<div class='col-sm-10'><p class='textomensagem'>".$linhaC['texto']."</p></div>";
                    echo "<div class='col-sm-2'><p class='nome2 text-center'>".$reg['nome']."</p></div>";
                    echo "</div>";
                }
            }
        ?>
        
      </div>
      <div class="table-sm" style="margin-top: 20px">

      </div>
    </div>
  </body>
</html>



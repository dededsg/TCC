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

    <div class="container">
        <div class="row">

            <a href="index.php" class="logo1 mt-3">SlideIt</a>
        </div>
        <div class="row boder rounded-1 border border-primary mb-2 mt-5">

            <div style="color: white;">
                <?php 
                $id = $_GET['id'];
                include('conexao.php');
                $sql = "SELECT * FROM postagem";
                $res = mysqli_query($conn, $sql);

                while ($linha = mysqli_fetch_array($res)){

                if(($linha['id_postagem']) == ($id)){
        ?>

                <h4 class="mt-2"><?php echo $linha['materia'] ?></h4>
                <a>Postagem:</a>
                <a><?php echo $linha['datapost'] ?> </a> <br>
                <a id="prazo">Prazo: <?php echo $linha['prazo'] ?> </a>
                <p>Descrição: <?php echo $linha['descricao'] ?></p>

                <a href="<?php echo 'arquivos/' . $linha['nomearquivo']?>"
                    download="<?php echo 'Slideit_' . $linha['materia']?>.pdf">Baixe o pdf!
                </a>
                <?php
            }
          };
        ?>
            </div>
        </div>
        <div>
        <form action="verificaPostUser.php" method="post">
            <div style="color: white;">
            
                <?php
            include('conexao.php');
            $sql = "SELECT * FROM propostas";
            $res = mysqli_query($conn, $sql);
            while ($linha = mysqli_fetch_array($res)){
              if(($linha['id_postagem']) == $id ){ ?>

              
                <div class="row rounded-1 border border-primary">
                  <div class="col-sm-10">

                    <h6 class="mt-2"><?php 
                    $idDev = $linha['id_dev'];
                    $sql1 = "SELECT * FROM cadastro WHERE id = '$idDev'";
                    $res1 = mysqli_query($conn, $sql1);
                    $text = mysqli_fetch_array($res1);
                    echo $text['nome'];
                    ?></h6>
                    <a>Proposta:</a>
                    <a><?php echo $linha['proposta'] ?></a>
                  </div>
                  <div class="col-sm-2">
                            <input type="hidden" name="id_dev" value="<?php echo $linha['id_dev']; ?>">
                            <input type="hidden" name="id_post" value="<?php echo $linha['id_postagem']; ?>">
                            <input class="col-sm-12 mt-2 inputSubmit btn btn-primary" type="submit" name="buta" value="Aceitar">
                   </div>
                  </div>


                <?php }}; ?>


            </div>
        </form>


    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>
</html>

<?php
  if(isset($_POST['buta']) && ($_POST['id_dev']) && $_POST['id_post']) {

    $id_dev = $_POST['id_dev'];
    $id_post = $_POST['id_post'];

    $sqlUpdate = "UPDATE postagem SET id_cadastroDev='$id_dev' WHERE id_postagem = $id_post";
    mysqli_query($conn, $sqlUpdate);
    if (mysqli_affected_rows($conn) > 0) {
      echo '<script type="text/javascript">'; 
      echo 'alert("Trabalho aceito com sucesso!");'; 
      echo 'window.location.href = "home.php";';
      echo '</script>';
    }
}
?>
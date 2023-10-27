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
    $reg = mysqli_fetch_array($resultado);

    $idP = $_GET['id'];
    $id = $_SESSION['id'];

    if($reg['user'] == 1){
        $local = "home";
    }else{
        $local = "homeDev";
    }
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
</head>

<body style=" background: linear-gradient(0,  #010118, #040437, #010118);">
    <div class="container">
    <div class="row">
            <div class="col-sm-6">
                <a href="index.php" class="logo1 mt-3">SlideIt</a>
            </div>
            <div class="col-sm-6 d-flex flex-row-reverse" >
                <a href="voltar.php?id=<?php echo $local; ?>" class="btn btn-lg btn-outline-danger mt-3" style="height: 60%;" id="nome5">Voltar</a>
            </div>
        </div>
        <div class="row mt-5" style="justify-content: space-around;">


            <div class="col-md-10 mx-flex col-lg-5">
                <form action="msn.php" method="POST" enctype="multipart/form-data"
                    class="mb-5 p-4 p-md-5 boder rounded-5 border border-primary" style="background-color: #ffffff00;">
                    <div class="card-content mt-3 mb-5">
                        <h1 class="titulo-index">
                            Chat
                        </h1>
                    </div>
                    <div class="row" style="color: white;">
                        <?php
            include('conexao.php');
            $id = $_SESSION['id']; 
            $sql = "SELECT * FROM chat WHERE id_postagem = $idP";
            $res = mysqli_query($conn, $sql);
            while ($linha = mysqli_fetch_array($res)){
                if($linha['escreve'] == $id){
                ?>

                        <div class="col-12 align-self-end m-0">
                            <p
                                style="border: 1px solid #0D6EFD; margin-left: 50%; padding-right: 2%; border-radius: 20px; text-align:right; margin-bottom: 0px;">
                                <?php echo $linha['texto']; ?></p>
                        </div>
                        <?php
            }else{ 
                ?>
                        <div class="col-12 align-self-start m-0">
                            <p
                                style="border: 1px solid #0D6EFD; margin-right: 50%; padding-left: 2%; border-radius: 20px; text-align:left; margin-bottom: 0px;">
                                <?php echo $linha['texto']; ?></p>
                        </div>
                        <?php
            }
        }
          ?>

                    </div>
                    <div class="form-floating mb-3 mt-3">
                        <textarea class="form-control" name="texto" placeholder="Mensagem ..." id="floatingTextarea2"
                            style="height: 100px" required></textarea>
                        <label for="floatingTextarea2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-card-text" viewBox="0 0 16 16">
                                <path
                                    d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                                <path
                                    d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z" />
                            </svg>
                            Mensagem ...
                        </label>
                    </div>
                    <input name="idP" type="hidden" value="<?php echo $idP; ?>">
                    <input name="id" type="hidden" value="<?php echo $id; ?>">


                    <div class="form-floating mt-5 mb-3">
                        <button class="btn btn-lg btn-outline-primary w-100" type="submit" style="color: white;"
                            name="submit">
                            Enviar
                        </button>
                    </div>
                </form>
            </div>

            <?php
          $id = $_SESSION['id'];
          $sqlV = "SELECT * FROM cadastro WHERE id = $id ";
          $resV = mysqli_query($conn, $sqlV);
          $linhaV = mysqli_fetch_array($resV);
          if ($linhaV['user'] === "2") { 
                    ?>



            <div class="col-md-10 mx-flex col-lg-5">
                <form action="concluir.php" method="POST" enctype="multipart/form-data"
                    class="mb-5 p-4 p-md-5 boder rounded-5 border border-primary" style="background-color: #ffffff00;">
                    <div class="card-content mt-3 mb-5">
                        <h1 class="titulo-index">
                            Concluir serviço
                        </h1>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" name="arquivo" type="file" id="formFile">
                        <label for="formFile">
                            Anexar slide
                        </label>
                    </div>

                    <input name="id" type="hidden" value="<?php echo $idP; ?>">

                    <div class="form-floating mt-5 mb-3">
                        <button class="btn btn-lg btn-outline-primary w-100" type="submit" style="color: white;"
                            name="submit">
                            Concluir
                        </button>
                    </div>

                    <div class="form-floating mt-2 mb-5">
                        <button class="btn btn-lg btn-outline-danger w-100" type="submit" style="color: white;"
                            name="excluir">
                            Desistir do serviço
                        </button>
                    </div>


                </form>
            </div>
            <?php
          }
        ?>

        </div>


    </div>



    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
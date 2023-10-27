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

    $sql13 = "SELECT * FROM cadastro WHERE email = '$logado' and user = '1'";
    $result13 = $conn->query($sql13);
    if(mysqli_num_rows($result13) < 1){
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('location: login.php');
    }

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

<body style=" background: linear-gradient(0,  #010118, #040437, #010118);">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <a href="index.php" class="logo1 mt-3">SlideIt</a>
            </div>
            <div class="col-sm-6 d-flex flex-row-reverse" >
                <a href="sair.php" class="btn btn-lg btn-outline-danger mt-3" style="    height: 60%;" id="nome5">Sair</a>
            </div>
        </div>
        <div class="row mt-5  align-items-center">
            <!---------------------------------------------------------------------------------------------------------------------------------------------->
            <div class="col-md-10 mx-flex col-lg-5">
                <form action="inputPostagem.php" method="POST" enctype="multipart/form-data"
                    class="mb-5 p-4 p-md-5 boder rounded-5 border border-primary" style="background-color: #ffffff00;">
                    <div class="card-content mt-3 mb-5">
                        <h1 class="titulo-index">
                            Pedido
                        </h1>
                    </div>
                    <div class="form-floating mb-3">
                        <select name="materia" class="form-select" aria-label="Default select example">
                            <option value="Portugues">Português</option>
                            <option value="Matematica">Matemática</option>
                            <option value="Geografia">Geografia</option>
                            <option value="História">História</option>
                            <option value="Informatica">Informática</option>
                            <option value="Sociologia">Sociologia</option>
                            <option value="Filosofia">Filosofia</option>
                            <option value="Educação fisica">Educação física</option>
                            <option value="Biologia">Biologia</option>
                            <option value="Fisica">Física</option>
                            <option value="Ingles">Inglês</option>
                            <option value="Artes">Artes</option>
                        </select>
                        <label for="inputMateria">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-journal-bookmark-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M6 1h6v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8V1z" />
                                <path
                                    d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
                                <path
                                    d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
                            </svg>
                            Selecione a matéria
                        </label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" name="desc" placeholder="Descrição ..." id="floatingTextarea2"
                            style="height: 100px" required></textarea>
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
                    <div class="form-floating mb-3">
                        <input type="date" name="prazo" class="form-control" id="inputPrazo" required>
                        <label for="inputPrazo">
                            Data limite para entrega
                        </label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" name="arquivo" type="file" id="formFile">
                        <label for="formFile">
                            Anexar arquivo
                        </label>
                    </div>
                    <div class="form-floating mt-5 mb-5">
                        <button class="btn btn-lg btn-outline-primary w-100" type="submit" style="color: white;"
                            name="submit">
                            Enviar
                        </button>
                    </div>
                </form>
            </div>



            <!--------------------------------------------------------------------------------------------------------------------------------------------------->

            <!--------------------------------------------------------------------------------------------------------------------------------------------------->

            <div class="col-md-2 mx-flex col-lg-7 m-6">
                <form action="chatPost.php" method="post">
                    <?php
            include('conexao.php');
            
            $id = $_SESSION['id'];
            
            $sql = "SELECT * FROM postagem WHERE id_cadastro = '$id' ";
            $res = mysqli_query($conn, $sql);
            $numRow = $res->num_rows;
            while ($linha = mysqli_fetch_array($res)){  ?>

                    <div class="row boder rounded-1 border border-primary mb-2 ">

                        <h4 class="mx-auto col-sm-12" style="color: white;">
                            <?php echo $linha['materia']; ?>
                        </h4>


                        <a class="btn btn-primary col-sm-11 mx-auto mt-2 mb-2" data-bs-toggle="collapse"
                            href="<?php echo "#" . $linha['id_postagem']; ?>" role="button" aria-expanded="false"
                            aria-controls="<?php echo $linha['id_postagem']; ?>">
                            Ver detalhes do pedido <?php echo $linha['id_postagem']; ?>
                        </a>

                        <div class="collapse" id="<?php echo $linha['id_postagem']; ?>">
                            <div class="card card-body">

                                <p> <?php  echo $linha['descricao']; ?> </p>

                                <p> <?php echo $linha['datapost']; ?>

                                    <?php
            if($linha['id_cadastroDev'] == null){
               $cor = "orange";
               $text ="aguardando";
             }elseif($linha['statu'] == 1){
               $cor = "blue";
               $text ="concluído";
             }elseif($linha['statu'] == 2){
               $cor = "red";
               $text = "cancelado";
             }else{
               $cor = "green";
               $text = "aceito";
             } ?>

                                    <a style="background-color: #ffffff00; color:<?php echo $cor; ?>;"><?php echo $text; ?>
                                    </a>
                                </p>

                            </div>


                        </div>
                        <td style="background-color: #ffffff00;">
                            <?php if($linha['id_cadastroDev'] == null){ ?>
                            <a href="verificaPostUser.php?id=<?php echo $linha['id_postagem']; ?>"
                                class="btn btn-primary col-sm-11 mx-auto mb-2 mt-2 ">Verificar</a>
                            <?php }elseif($linha['statu'] == null){ ?>
                            <a href="verificaAceito.php?id=<?php echo $linha['id_postagem']; ?>"
                                class="btn btn-primary col-sm-11 mx-auto mb-2 mt-2">Detalhes</a>
                            <?php }elseif($linha['statu'] == 1){ ?>
                            <a href="historico.php?id=<?php echo $linha['id_postagem']; ?>"
                                class="btn btn-primary col-sm-11 mx-auto mb-2 mt-2">Histórico</a>
                            <?php }elseif($linha['statu'] == 2){ ?>
                            <a class="btn btn-danger col-sm-11 mx-auto  mb-2 mt-2">Cancelado</a>
                            <?php }?>
                        </td>
                        </tr>
                    </div>
                    <?php }; ?>
                    </tbody>
                    </table>
                </form>

            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>


</body>

</html>
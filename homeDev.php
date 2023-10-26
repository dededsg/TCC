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
        <div class="row mt-5">
            <div class="col-md-2 col-lg-6 rounded-1 border border-primary mb-5">
                <div class="mt-2 mb-2 mx-auto col-sm-12 d-flex" style="color: white;">
                    <h4 class="col-sm-4" style="text-align: left!important;">N°</h4>
                    <h3 class="col-sm-4" style="text-align: center!important;">Meus serviços</h3>
                    <h4 class="col-sm-4" style="text-align: right!important;">Prazo</h4>
                </div>


                <form action="chatPost.php" method="post">
                    <?php
            include('conexao.php');
            $id = $_SESSION['id']; 
            $sql = "SELECT * FROM postagem";
            $res = mysqli_query($conn, $sql);
            while ($linha = mysqli_fetch_array($res)){
              if($linha['id_cadastroDev'] == $id){
          ?>
                    <div class="row rounded-1 border border-primary">
                        <div class="mt-2 mb-2 mx-auto col-sm-12 d-flex" style="color: white;">
                            <h4 class="col-sm-4" style="text-align: left!important;">
                                <?php echo "#" .$linha['id_postagem']; ?></h4>
                            <h4 class="col-sm-4" style="text-align: center!important;"><?php echo $linha['materia']; ?>
                            </h4>
                            <h4 class="col-sm-4" style="text-align: right!important; color: red;">
                                <?php
                                if($linha['statu'] == 1) {
                                  echo "Concluído"; 
                                }elseif($linha['statu'] ==2){
                                    echo "Cancelado"; 
                                }else{
                                    echo $linha['prazo']; 
                                }
                                ?></h4>
                        </div>
                        <a class="btn btn-primary col-sm-11 mx-auto mt-2 mb-2" data-bs-toggle="collapse"
                            href="<?php echo "#" . $linha['id_postagem']; ?>" role="button" aria-expanded="false"
                            aria-controls="<?php echo $linha['id_postagem']; ?>">
                            Ver detalhes do pedido
                        </a>
                        <div class="collapse" id="<?php echo $linha['id_postagem']; ?>">
                            <div class="card card-body">
                                <p> <?php  echo $linha['descricao']; ?> </p>
                                <p> <?php echo $linha['datapost']; ?></p>
                                <p>
                                    <a href="<?php echo 'arquivos/' . $linha['nomearquivo'];?>"
                                        download="<?php echo 'Slideit_' . $linha['materia'];?>.pdf">Download</a>
                                </p>

                                <?php if($linha['statu'] == null){ ?>
                                <a href="verificaAceito.php?id=<?php echo $linha['id_postagem'];?>"
                                    class="btn btn-primary">Detalhes</a>
                                <?php }elseif($linha['statu'] == 1){ ?>
                                <a href="historico.php?id=<?php echo $linha['id_postagem']; ?>"
                                    class="btn btn-primary">Histórico</a>
                                <?php }elseif($linha['statu'] == 2){ ?>
                                <a class="btn btn-danger">Cancelado</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <?php }} ?>
                </form>
            </div>







            <div class="col-md-2 col-lg-6 rounded-1 border border-primary mb-5">
                <div>
                    <h3 style="color: white; text-align: center;" class="mb-2 mt-2">
                        Pedidos
                    </h3>
                </div>


                <?php
include('conexao.php');
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
$data = date('d-m-Y');

$sql = "SELECT * FROM postagem";
$res = mysqli_query($conn, $sql);
while ($linha = mysqli_fetch_array($res)){
  if(strtotime($linha['prazo']) >= strtotime($data) && ($linha['id_cadastroDev'] == null)){
?>

                <div class="row boder rounded-1 border border-primary">
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

                            <?php echo $linha['materia'] ?>
                            <?php echo $linha['descricao'] ?>
                            <a id="prazo"><?php echo $linha['prazo'] ?></a>
                            <?php echo $linha['datapost'] ?>
                            <a href="verificaPost.php?id=<?php echo $linha['id_postagem']; ?>"
                                class="btn btn-primary">Verificar</a>


                        </div>
                    </div>
                </div>
            
            <?php }} ?>
        </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
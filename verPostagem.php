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
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
        <title>Slideit</title>
        <link rel="stylesheet" type="text/css" href="CSS.css">
    </head>
    <body>
    <div class="row">
      <nav class="navbar navbar-expand-sm">
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarContent">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="col-sm-6">
          <a href="home.php" class="logo">SlideIt</a>
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
            </div>
        </div>
        <div class="container">
  <div class="table-sm" style="margin-top: 20px">
    <form action="chatPost.php" method="post">
      <table class="table ">
        <caption>
          Postagens
        </caption>

        <thead>
          <tr>
            <th scope="col-sm-1">Matéria</th>
            <th scope="col-sm-7">Descrição</th>
            <th scope="col-sm-1">Prazo</th>
            <th scope="col-sm-1">Data de postagem</th>
            <th scope="col-sm-1">Status</th>
            <th scope="col-sm-1">Respostas</th>
          </tr>
        </thead>

        <tbody>
          <?php
            include('conexao.php');
            
            $id = $_SESSION['id'];
            
            $sql = "SELECT * FROM postagem";
            $res = mysqli_query($conn, $sql);
            while ($linha = mysqli_fetch_array($res)){
              if($linha['id_cadastro'] == $id){
          ?>
          <tr>          
            <td><?php echo $linha['materia'] ?></td>
            <td><?php echo $linha['descricao'] ?></td>
            <td id="prazo"><?php echo $linha['prazo'] ?></td>
            <td><?php echo $linha['datapost'] ?></td>
            <?php if($linha['id_cadastroDev'] !== null){
              $cor = "green";
              $text = "aceito";
            }else{
              $cor = "red";
              $text ="aguardando";
            } ?>
            <td style="color:<?php echo $cor; ?>;" ><?php echo $text; ?></td>
            <td>
              <?php
                if($linha['id_cadastroDev'] == null){ 
              ?>

                <a href="chatPostUser.php?id=<?php echo $linha['id_postagem'] ?>" class="btn btn-primary">Verificar</a>

              <?php }else{ ?>

                <a href="chatAceito.php?id=<?php echo $linha['id_postagem'] ?>" class="btn btn-primary">Chat</a>

              <?php } ?>
            </td>
          </tr>
          <?php }}; ?>
        </tbody>
      </table>
    </form>
  </div>
</div>
        
    </body>
</html>
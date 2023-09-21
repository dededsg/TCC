<?php
    session_start();
    $adm = "adm";
    
    $email1 = $_SESSION['email'] ;
    $senha1 = $_SESSION['senha'] ;

    if((!isset($_SESSION['email']) == false) and (!isset($_SESSION['senha']) == false   ))
    {
        if(($email1 == $adm) and ($senha1 == $adm))
        {
        }else{
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            header('location: login.php'); 
        }
    }else{
        print_r($_SESSION); 
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
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
        <div class="col-sm-4">
          <a href="index.php" class="logo">SlideIt4Me</a>
        </div>
        <div class="col-sm-auto" style="margin-right: 2rem">
          <a href="sair.php" class="btn btn-danger" id="nome5">Sair</a>
        </div>
      </nav>
    </div>

    <div class="container">
      <div class="row">
        <div
          class="mx-auto col-sm-6"
          style="text-align: center; margin-top: 50px"
        >
          <h1>ADM</h1>
        </div>
      </div>
      <div class="table-responsive-sm" style="margin-top: 20px">
        <table class="table table-striped">
          <caption>
            Lista de usuários
          </caption>

          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nome</th>
              <th scope="col">Sobrenome</th>
              <th scope="col">Email</th>
              <th scope="col">Senha</th>
              <th scope="col">Editar</th>
            </tr>
          </thead>

          <tbody>
            <?php
                    include('conexao.php');
                    $sql = "SELECT * FROM cadastro";
                    $res = mysqli_query($conn, $sql);
                    while ($linha = mysqli_fetch_array($res)){
                ?>
            <tr>
              <th scope="row"><?php echo $linha['id'] ?></th>
              <td><?php echo $linha['nome'] ?></td>
              <td><?php echo $linha['sobrenome'] ?></td>
              <td><?php echo $linha['email'] ?></td>
              <td><?php echo $linha['senha'] ?></td>
              <td>
                <a  href="editUser.php?id=<?php echo $linha['id'] ?> "class="btn btn-primary">Editar</a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </body>
</html>

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
<?php
include('conexao.php');

$id = $_GET['id'];

if (isset($_POST['btnSalvar'])){
    $newNome = $_POST['nome'];
    $newSobrenome = $_POST['sobrenome'];
    $newEmail = $_POST['email'];
    $newSenha = $_POST['senha'];
    $sqlUpdate = "UPDATE cadastro SET nome='$newNome', sobrenome='$newSobrenome' , email='$newEmail' , senha='$newSenha' WHERE id=$id";
    mysqli_query($conn, $sqlUpdate);
    if (mysqli_affected_rows($conn) > 0) {
         echo '<script type="text/javascript">'; 
 echo 'alert("Usuário alterado com sucesso!!");'; 
 echo 'window.location.href = "adm.php";';
 echo '</script>';
    }
}

$sql = "SELECT * FROM cadastro WHERE id=$id";
$rs = mysqli_query($conn, $sql);
$linha = mysqli_fetch_array($rs);
?>

<!DOCTYPE html>
<?php
include('conexao.php');

$id = $_GET['id'];

if (isset($_POST['btnExcluir'])){
    $sqlExcluir = " DELETE FROM cadastro WHERE id = $id" ;
    mysqli_query($conn, $sqlExcluir);
    if (mysqli_affected_rows($conn) > 0) {
         echo '<script type="text/javascript">'; 
 echo 'alert("Usuário excluido com sucesso!!");'; 
 echo 'window.location.href = "adm.php";';
 echo '</script>';
    }
}

$sql = "SELECT * FROM cadastro WHERE id=$id";
$rs = mysqli_query($conn, $sql);
$linha = mysqli_fetch_array($rs);
?>
<html lang="en">
<head>
<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
        <title>Cadastro de Usuário</title>
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
                <a href="home.php"><img src="logo.png" alt="logo" style="width: 250px; margin: 0 2rem 0 2rem" /></a>
                </div>
                <!-- Adicionei um novo bloco para o menu, ele aparece apenas para telas tablet, pc
                assim puder deixa-lo centralizado sem cagar quando for pro mobile -->
                <div class="col-sm-2 d-sm-block d-none">
                    <ul class="navbar-nav justify-content-center">
                        <li class="nav-item"><a class="nav-link" href="sobre.php"> Sobre nós </a></li>
                        <li class="nav-item"><a class="nav-link" href=" # "> Política de uso </a></li>
                        <li class="nav-item"><a class="nav-link" href=" # "> Contato </a></li>
                    </ul>
                </div>
                <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
                    <!-- aparece só para mobile -->
                <ul class="navbar-nav col-sm-6 d-sm-none d-block">
                    <li class="nav-item"><a class="nav-link" href="sobre.php"> Sobre nós </a></li>
                    <li class="nav-item"><a class="nav-link" href=" # "> Política de uso </a></li>
                    <li class="nav-item"><a class="nav-link" href=" # "> Contato </a></li>
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
    <h3>Edição de dados</h3>
    <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
        <fieldset>
            <legend>Insira os dados</legend>
                <p>Nome:<input type="text" name="nome" value="<?php echo $linha['nome']?>"></p>
                <p>Sobrenome:<input type="text" name="sobrenome" value="<?php echo $linha['sobrenome']?>"></p>
                <p>Email:<input type="text" name="email" value="<?php echo $linha['email']?>"></p>
                <p>Senha:<input type="password" name="senha" value="<?php echo $linha['senha']?>"></p>
                <p><input type="submit" value="Salvar alterações" name="btnSalvar"></p>
                <p><input type="submit" value="Excluir" name="btnExcluir"></p>
                <p><a href="adm.php" class="btn btn-danger" id="nome5">Voltar</a></p>
        </fieldset>
    </form>
</div>
</body>
</html>

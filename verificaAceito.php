<?php

session_start();

if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
  unset($_SESSION['email']);
  unset($_SESSION['senha']);
  header('location: login.php');
} else {
  $logado = $_SESSION['email'];

  include_once('conexao.php');

  $sql = "SELECT * FROM cadastro WHERE email = '$logado'";

  $resultado = mysqli_query($conn, $sql) or die("Erro ao retornar dados");

  $registro = mysqli_fetch_array($resultado)

  //-------------------------------//




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
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" type="text/css" href="CSS.css">
    <style>
    input[type="file"] {
        display: none;
    }
    </style>
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
                <a><?php echo $registro['nome'] . " ";
              echo $registro['sobrenome']; ?></a>
            </div>

            <div class="col-sm-auto">
                <lord-icon src="https://cdn.lordicon.com/dxjqoygy.json" trigger="hover"
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

        <div class="container">

            <!-- Incio da row -->
            <div class="row justify-content-center">

                <!-- Inicio do col-md-7 -->
                <div class="col-md-8 ">
                    <h1>Mensagens</h1>
                    <!-- Divisão que renderiza o chat -->

                    <form action="verificaAceito.php" method="POST">
                        <input type="hidden" id='id' name="id" value="<?php echo $_GET['id']; ?>">
                        <input type="submit" class="col btn-danger" Value="Cancelar" name="btnCancelar"
                            id="btnCancelar">
                    </form>


                    <?php
          $id = $_SESSION['id'];
          $sqlV = "SELECT * FROM cadastro WHERE id = $id ";
          $resV = mysqli_query($conn, $sqlV);
          $linhaV = mysqli_fetch_array($resV);

          if ($linhaV['user'] === "2") {
          ?>

                    <form action="concluir.php" method="POST" enctype="multipart/form-data">
                        <input type="submit" class="col btn-success" Value="Concluir" name="submit" id="submit">
                        <input type="hidden" id='id' name="id" value="<?php echo $_GET['id']; ?>">
                        <label for="arquivo"
                            style="width: 200px; padding: .375rem .75rem; background-color: #0d6efd; color: #FFF; text-align: center; display: inline; margin-top: 30px; margin-bottom: 20px; cursor: pointer; border-radius: 30px; ">Arquivo</label>
                        <input type="file" name="arquivo" id="arquivo">
                        <span id="nomearquivo"></span>
                    </form>

                    <?php
          }
          ?>

                </div>
                <!-- Final da row -->

            </div>
            <!-- Final do container -->
            <div>
                <footer>
                    <p style="text-align: center;">
                        Copyright © 2023 Slideit4me
                    </p>
                </footer>
            </div>
</body>



<script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<?php
  $valor = $_GET['id'];
  ?>
<script>
var valorGET = <?php echo json_encode($valor); ?>;
document.getElementById('arquivo').onchange = function() {
    document.getElementById("nomearquivo").innerHTML = this.value;
};
</script>
<script type="text/javascript" src="script.js"> </script>

</html>

<?php

  if (isset($_POST['btnCancelar']) == TRUE) {
    echo "aobah";
    $status = 2;
    $idUser = $_SESSION['id'];
    $id = $_POST['id'];

    $sqlCancela = "UPDATE postagem SET statu = '$status' WHERE id_postagem = $id";
    mysqli_query($conn, $sqlCancela);

    $sql = "SELECT * FROM postagem WHERE id_postagem = $id";
    $res = mysqli_query($conn, $sql);
    $linha = mysqli_fetch_array($res);

    if (mysqli_affected_rows($conn) > 0) {
      if ($linha['id_cadastroDev'] == $idUser) {

        echo '<script type="text/javascript">';
        echo 'alert("Cancelado com sucesso!!");';
        echo 'window.location.href = "homeDev.php";';
        echo '</script>';
      } else {

        echo '<script type="text/javascript">';
        echo 'alert("Cancelado com sucesso!!");';
        echo 'window.location.href = "home.php";';
        echo '</script>';
      }
    }
  }
}
?>
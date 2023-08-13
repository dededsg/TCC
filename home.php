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

            <main style="margin-left: 30%;">
                <div style="margin-top: 20px;">
                    <form action="inputPostagem.php" method="POST" enctype="multipart/form-data">
                        <div class="cadastro" style="padding-left: 105px; padding-right: 105px;">
                        <h1 class="titulo-index">
                        Faça seu Pedido
                    </h1>   

                          <div class="card-content">

                            <div class="card-content-area">
                                <select name="materia">
                                    <option value="Matéria não definida">Selecione a matéria</option>
                                    <option value="Portugues">Portugues</option>
                                    <option value="Matematica">Matematica</option>
                                    <option value="Geografia">Geografia</option>
                                    <option value="História">História</option>
                                    <option value="Informatica">Informatica</option>
                                    <option value="Sociologia">Sociologia</option>
                                    <option value="Filosofia">Filosofia</option>
                                    <option value="Educação fisica">Educação fisica</option>
                                    <option value="Biologia">Biologia</option>
                                    <option value="Fisica">Fisica</option>
                                    <option value="Ingles">Ingles</option>
                                    <option value="Artes">Artes</option>
                                </select>
                            </div>

                            <div class="card-content-textarea">
                                <textarea type="text" name="desc" placeholder="Descrição ..."></textarea>
                            </div>

                            <div class='input-wrapper'>

                                <div class="card-content-area">
                                    <label style="color: rgb(118, 118, 118);">Data limite para entrega</label>
                                    <input type="date" name="prazo">
                                </div>

                            <div class="card-content-file">
                                <label for="arquivo" style="width: 200px; padding: .375rem .75rem; background-color: #0d6efd; color: #FFF; text-align: center; display: inline; margin-top: 30px; margin-bottom: 20px; cursor: pointer; border-radius: 30px; ">Arquivo</label>
                                <input type="file" name="arquivo" id="arquivo">
                                <span id="nomearquivo"></span>
                            </div>



                            <div class="row" style="margin-top: 20px;">
                                <div class="col-sm-12 mx-auto">
                                    <input class="col-sm-12 inputSubmit btn btn-primary" type="submit" name="submit" value="Enviar" style=" margin-top: 50px; border-radius: 30px;">
                                </div>
                            </div>
                          </div>
                        
                    </form> 
                </div>
            </main>
            <script>
        document.getElementById('arquivo').onchange = function () {
        document.getElementById("nomearquivo").innerHTML = this.value; 
};
    </script>

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
            <?php if($linha['id_cadastroDev'] == null){
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
            <td style="color:<?php echo $cor; ?>;" ><?php echo $text; ?></td>
            <td>
              <?php if($linha['id_cadastroDev'] == null){ ?>
                <a href="chatPostUser.php?id=<?php echo $linha['id_postagem'] ?>" class="btn btn-primary col-sm-9">Verificar</a>
              <?php }elseif($linha['statu'] == null){ ?>
                <a href="chatAceito.php?id=<?php echo $linha['id_postagem'] ?>" class="btn btn-primary col-sm-9">Chat</a>
              <?php }elseif($linha['statu'] == 1){ ?>
                <a href="historico.php?id=<?php echo $linha['id_postagem'] ?>" class="btn btn-primary col-sm-9">Histórico</a>
              <?php }elseif($linha['statu'] == 2){ ?>
                <a class="btn btn-danger col-sm-9">Cancelado</a>
              <?php }?>
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
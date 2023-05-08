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
        <title>Cadastro de Usuário</title>
        <link rel="stylesheet" type="text/css" href="CSS.css">
    </head>
    <body>
    <div class="row">
      <nav class="navbar navbar-expand-sm">
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarContent">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="col-sm-4">
            <!-- adicionei margin left para mover a logo para direita e
            margin right para ficar bom no mobile -->
          <a href="index.php" class="logo">SlideIt4Me</a>
        </div>
        <!-- Adicionei um novo bloco para o menu, ele aparece apenas para telas tablet, pc
        assim puder deixa-lo centralizado sem cagar quando for pro mobile -->
        <div class="col-sm-4 d-sm-block d-none">
          <ul class="navbar-nav justify-content-center">
            <li class="nav-item"><a style="color:gray; font-weight: bold" class="nav-link" href="index.php"> Início </a></li>  
            <li class="nav-item"><a style="color:gray; font-weight: bold" class="nav-link" href="sobre.php"> Sobre nós </a></li>
            <li class="nav-item"><a style="color:gray; font-weight: bold" class="nav-link" href=" poliuso.php "> Política de uso </a></li>
            <li class="nav-item"><a style="color:gray; font-weight: bold" class="nav-link" href=" contato.php "> Contato </a></li>
          </ul>
        </div>
        <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
            <!-- aparece só para mobile -->
          <ul class="navbar-nav col-sm-6 d-sm-none d-block"> 
            <li class="nav-item"><a class="nav-link" href="index.php"> Início </a></li>  
            <li class="nav-item"><a class="nav-link" href="sobre.php"> Sobre nós </a></li>
            <li class="nav-item"><a class="nav-link" href=" poliuso.php "> Política de uso </a></li>
            <li class="nav-item"><a class="nav-link" href=" contato.php "> Contato </a></li>
          </ul>
          <div class="col-sm-auto" style="margin-right: 2rem">
            <a href="index.php" class="btn btn-danger" id="nome5" style="margin-right: 200px;">Cancelar</a>
          </div>
        </div>
      </nav>
    </div>

<!------------------------------------------------------------------------------------------------------------->
        <main class="cadastro" style="margin-left: 32%; margin-bottom: 200px;">
            <h1 class="titulo-index">
            Cadastro
            </h1>

                <div style="margin-top: 50px;">
                    <form action="insertUser.php" method="POST">
                        <div class="container" style="padding-left: 105px; padding-right: 105px;">
                          <div class="card-content">

                            <div class="card-content-area">
                                <input type="text" id="nome7" name="nome"  placeholder="Nome">
                            </div>

                            <div class="card-content-area">
                              <input type="text" id="nome3" name="sobrenome"  placeholder="Sobrenome">
                            </div>

                            <div class="card-content-area">
                              <input type="text" id="nome3" name="email"  placeholder="Email">  
                            </div>
        
                            <div class="card-content-area">
                                <input type="password" id="nome1" name="senha"  placeholder="Senha">
                            </div>

                            <div class="row" style="margin-top: 20px;">
                                    <div class="col-sm-12 mx-auto">
                                        <input class="col-sm-12 inputSubmit btn btn-primary" type="submit" name="submit" value="Cadastrar" style="margin-top: 50px; border-radius: 30px;">
                                    </div>
                                </div>
                          </div>
                        </div>
                    </form> 
                </div>
            </main>
        <div>
    <footer>
      <p style="text-align: center;">
      Copyright © 2023 Slideit4me
      </p>
    </footer>
  </div>
    </body>
</html>



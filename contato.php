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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="CSS.css">
        <title>Contato</title>
        <style>

        </style>
    </head>
    <body>

<!---------------------Barra de navegação--------------------------------------------------------------------------------------------------------------------------->

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
            <li class="nav-item"><a style="text-decoration: underline; text-underline-offset: 4px; font-weight: bold" class="nav-link" href=" contato.php "> Contato </a></li>
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
          <!-- tamanho ajustado para ficar responsivo -->
          <div class="col-sm-auto" style="margin-right: 2rem">
                <a href="login.php" class="btn btn-link" id="nome4" style="text-decoration: none; color: rgba(107, 122, 153, 1); font-weight: bold;">Fazer login</a>
          </div>
          <!-- margin right adicionado -->
          <div class="col-sm-auto" style="margin-right: 2rem">
            <a style="margin-right: 200px; background-color: #0061E0;" href=" cadastro.php " class="btn btn-primary" id="nome4">Criar uma conta</a>
          </div>
        </div>
      </nav>
    </div>

<!---------------------Meio--------------------------------------------------------------------------------------------------------------------------->

    <div class="main container-fluid">
      <main>
      </main>
    </div>

<!-------------------Rodapé---------------------------------------------------------------------------------------------------------------------------->
  <div>
    <footer>
      <p style="text-align: center;">
      Copyright © 2023 Slideit4me
      </p>
    </footer>
  </div>


    </body>
</html>
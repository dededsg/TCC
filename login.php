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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <title>SlideIt</title>
    <link rel="shortcut icon" href="icon/icon.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="CSS.css">
</head>

<body style="background-color: #040428;">
    <div class="container">
        <div class="row">
            <a href="index.php" class="logo1 mt-3">SlideIt</a>
        </div>
        <div class="row mt-5 align-items-center">

            <div class="col-md-10 mt-5  mx-auto col-lg-5 mb-5" style="padding-bottom: 40px;">
                <form action="testeLogin.php" method="POST"
                    class="mb-5 p-4 p-md-5 boder rounded-5 border border-primary" style="background-color: #ffffff00;">
                    <div class="card-content mt-5 mb-5">
                        <h1 class="titulo-index">
                            Login
                        </h1>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="email" class="form-control" id="inputEmail" placeholder="E-mail"
                            required>
                        <label for="inputEmail">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-envelope" viewBox="0 0 16 16">
                                <path
                                    d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                            </svg>
                            E-mail
                        </label>
                    </div>
                    <div class="form-floating">
                        <input type="password" name="senha" class="form-control" id="inputPassword" placeholder="Senha"
                            required>
                        <label for="inputPassword">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-key" viewBox="0 0 16 16">
                                <path
                                    d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z" />
                                <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                            </svg>
                            Senha
                        </label>
                    </div>
                    <div class="form-floating mt-5 mb-5">
                        <button class="btn btn-lg btn-outline-primary w-100" type="submit" style="color: white;"
                            name="submit">
                            Entrar
                        </button>
                    </div>
                    <div class="form-floating mb-4 ml-3">
                        <a href="cadastro.php" class="" id="link">Fazer o cadastro</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
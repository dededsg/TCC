<?php
    session_start();
    print_r($_REQUEST);
    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha']))
    {
        //acessa 
        include_once('conexao.php');
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        print_r('Email: ' . $email);
        print_r('<br>');
        print_r('Senha: ' . $senha);

        $sql = "SELECT * FROM cadastro WHERE email = '$email' and senha = '$senha'";

        $result = $conn->query($sql);

        print_r($sql);
       print_r($result);
       if(mysqli_num_rows($result) < 1)
       {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        echo '<script type="text/javascript">'; 
        echo 'alert("Usuário ou senha incorreto");'; 
        echo 'window.location.href = "login.php";';
        echo '</script>';
            
       }
       else
       {
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;

        $email12 = $_SESSION['email'];
        $senha12 = $_SESSION['senha'];
        $email1 = "adm";
        $senha1 = "adm";
            if(($email12 == $email1) and ($senha12 == $senha1)){ 
                header('location: adm.php');
            }else{
                header('location: home.php');
            }
       }
    }
    else
    {
        //não acessa    
        header('location: login.php');
    }

?>
<?php
    session_start();
    
    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha']))
    {
        //acessa 
        include_once('conexao.php');
        $email = $_POST['email'];
        $senha = md5($_POST['senha']);

        $sql = "SELECT * FROM cadastro WHERE email = '$email' and senha = '$senha'";
        $result = $conn->query($sql);

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

        $sql1="SELECT * FROM cadastro WHERE email = '$email'";
        

        $sql2 = "SELECT id FROM cadastro WHERE email = '$email'";
        $result2 = $conn->query($sql2);
        $row = $result2->fetch_assoc();
        $_SESSION['id'] = $row['id'];

       
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        

        $email12 = $_SESSION['email'];
        $senha12 = $_SESSION['senha'];
        $email1 = "adm";
        $senha1 = "adm";
            if(($email12 == $email1) and ($senha12 == $senha1)){ 
                header('location: adm.php');
            }else{

                $sql = "SELECT user FROM cadastro WHERE email = '$email'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                $idUser = $row['user'];

                if($idUser == 1){
                    header('location: home.php');
                }elseif($idUser == 2){
                    header('location: homeDev.php');
                }else{
                    header('location: testUser.php');
                }
            }
       }
    }
    else
    {
        //não acessa   
        echo '<script type="text/javascript">'; 
        echo 'alert("Informe todos os campos!");'; 
        echo 'window.location.href = "login.php";';
        echo '</script>'; 
    }

?>
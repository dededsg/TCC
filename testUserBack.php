<?php
include_once('conexao.php');
if(isset($_POST['submit'])) {
  $escolha = $_POST["escolha"];
  session_start();
  $id = $_SESSION['id'];

  $sql = "SELECT * FROM cadastro WHERE id = '$id' and user != '0'";
  $result = $conn->query($sql);


  if(mysqli_num_rows($result) < 1){
  $sql = "UPDATE cadastro SET user='$escolha' WHERE id=$id";
    mysqli_query($conn, $sql);

    if(mysqli_affected_rows($conn) > 0) {
        if($escolha == 1){
            mysqli_close($conn);
            echo '<script type="text/javascript">'; 
            echo 'alert("Boa escolha!");'; 
            echo 'window.location.href = "home.php";';
            echo '</script>';
        }elseif($escolha == 2){
            mysqli_close($conn);
            echo '<script type="text/javascript">'; 
            echo 'alert("Boa escolha!");'; 
            echo 'window.location.href = "homeDev.php";';
            echo '</script>';
        }else{
            mysqli_close($conn);
            echo '<script type="text/javascript">'; 
            echo 'alert("!!!!!!!!!--ERROR--!!!!!!!!");'; 
            echo 'window.location.href = "cadastro.php";';
            echo '</script>';
        }
        
    }
        mysqli_close($conn);
        echo '<script type="text/javascript">'; 
        echo 'alert("!!!!!!!!!--ERROR--!!!!!!!!");'; 
        echo 'window.location.href = "cadastro.php";';
        echo '</script>';
}
mysqli_close($conn);
        echo '<script type="text/javascript">'; 
        echo 'alert("!!!!!!!!!--ERROR--!!!!!!!!");'; 
        echo 'window.location.href = "login.php";';
        echo '</script>';
  
}else{
    mysqli_close($conn);    
          
    echo '<script type="text/javascript">'; 
    echo 'alert("Informe todos os campos!");'; 
    echo 'window.location.href = "login.php";';
    echo '</script>';
}
?>
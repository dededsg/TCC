<?php
    $id = $_GET['id'];

    switch ($id) {

    case "home":
         header('location: home.php');
    break;

    case "homeDev":
        header('location: homeDev.php');
    break;
    }


   
?>
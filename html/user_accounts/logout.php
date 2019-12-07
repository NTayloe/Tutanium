<?php

    if(!isset($_SESSION)){
        session_start();
    }

    //if already logged log out
    if(isset($_SESSION['authenticated']) && $_SESSION["authenticated"] === true){
        echo "<script>console.log('logout');</script>";
        $_SESSION['authenticated'] = false;
    }

    echo "Logged Out";
    header("Location: /html/user_accounts/login.php");
?>
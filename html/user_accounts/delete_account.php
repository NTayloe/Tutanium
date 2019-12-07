<?php

    require_once('../../includes/database_interface.php');
    require_once('../../includes/db_connection.php');

    if(!isset($_SESSION)){
        session_start();
    }

    //if already logged log out
    if(isset($_SESSION['authenticated']) && $_SESSION["authenticated"] === true){
        
        echo "<script>console.log('delete account');</script>";
        $_SESSION['authenticated'] = false;

        //get a database connection
        $connection = connect_to_db();

        //get the user from the database
        $sql = sprintf("DELETE FROM `users` WHERE `username` = '%s'", $connection->real_escape_string($_SESSION['username']));

        //send the given sql query to the given db connection
        $result = queryDatabase($sql, $connection);

    }

    echo "Account Deleted";
    header("Location: /html/user_accounts/login.php");
?>
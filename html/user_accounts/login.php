<?php
    require_once('../../includes/database_interface.php');
    require_once('../../includes/db_connection.php');

    if(!isset($_SESSION)){
        session_start();
    }

    //if already logged in redirect to the profile page
    if(isset($_SESSION['authenticated']) && $_SESSION["authenticated"] === true){
        echo "<script>console.log('preauth');</script>";
        header("Location: /html/user_accounts/profile.php");
    }

    if(isset($_POST['submit'])){

        //get a database connection
        $connection = connect_to_db();

        if(isset($_POST['username']) && $_POST['password']){

            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);

            //get the user from the database
            $sql = sprintf("SELECT 1 FROM users WHERE username='%s' AND pass=PASSWORD('%s')", $connection->real_escape_string($username), $connection->real_escape_string($password));

            //send the given sql query to the given db connection
            $result = queryDatabase($sql, $connection);

            //check valid user
            if($result->num_rows === 1){
         
                $_SESSION["authenticated"] = true;
                $_SESSION["username"] = $username;
                header("Location: /html/user_accounts/profile.php");

            }else{
                //invalid credintials
            }
        }

    }   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/css/navbar-footer.css">
    <link rel="stylesheet" href="/css/user_accounts/login.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="/js/bootstrap/bootstrap.min.js"></script>
    <script src="/js/user_accounts/login_verify.js"></script>
    <title>Log In</title>
</head>
<body>

    <?php require_once('../../includes/helper.php'); ?>

    <?php render('header', array('title' => 'Tutanium')); ?>

    <div id="title" style="margin-top: 200px;">
        <h2>Log In</h2>
    </div>

    <div class="container" style="margin-bottom: 300px;">

        <form id="login_block" class=".text-center" action="<?= $_SERVER["PHP_SELF"] ?>" method="post" onsubmit="return verify();">

            <div id="login_cred">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Username">    
            </div>
            
            <div id="login_cred">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Password">    
            </div>

            <button type="submit" id="submit_button" name="submit" class="btn btn-primary">Log In</button>

            <span id="register" class="btn">
                Don't Already Have An Account?
                <a href="/html/user_accounts/register.php">Create One</a>
            </span>

            <div>
                <br>
                <a href="/html/user_accounts/forgot_password.php">I forgot my password</a>
            </div>

        </form>

    </div>

    <?php render('footer'); ?>

</body>
</html>